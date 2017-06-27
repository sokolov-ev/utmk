<?php

namespace App\Http\Controllers\Backend;

use App;
use Excel;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Menu;
use App\Prices;
use App\Products;
use App\Metatags;

use Language;

class ImportController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('weight', 'ASC')->get();

        return view('backend.exel.index', [
            'menu' => $menu->toArray(),
        ]);
    }

    public function export(Request $request)
    {
        $id   = $request->input('menu');
        $lang = $request->input('lang');
        $menu = Menu::where('id', $id)->orderBy('weight', 'ASC')->first();

        if (!$menu) {
            session()->flash('danger', 'Категория не найдена.');
            return redirect('/administration/exel');
        }

        $data = \Date('Y_m_d');

        Excel::create($menu->slug . '_' . $data . '_' . $lang, function($excel) use ($menu, $lang) {
            $excel->sheet($menu->slug, function($sheet) use ($menu, $lang) {
                $result = [];

                foreach ($menu->products as $key => $product) {
                    $result[$key]['id']                  = $product->id;
                    $result[$key]['Name']                = Language::getArrayStrict($product->title, $lang);
                    $result[$key]['Description_product'] = Language::getArrayStrict($product->description, $lang);

                    $result[$key]['Slug']        = $product->slug;
                    $result[$key]['Cost']        = $product->prices[0]['price'];
                    $result[$key]['Unit']        = $product->prices[0]['type'];
                    $result[$key]['Title']       = Language::getArrayStrict($product->metatags['title'], $lang);
                    $result[$key]['Description'] = Language::getArrayStrict($product->metatags['description'], $lang);
                    $result[$key]['Keywords']    = Language::getArrayStrict($product->metatags['keywords'], $lang);
                    $result[$key]['In_stock']    = $product->in_stock;

                    $result[$key]['Steel_grade']      = Language::getArrayStrict($product->steel_grade, $lang);
                    $result[$key]['Sawing']           = Language::getArrayStrict($product->sawing, $lang);
                    $result[$key]['Standard']         = Language::getArrayStrict($product->standard, $lang);
                    $result[$key]['Diameter']         = Language::getArrayStrict($product->diameter, $lang);
                    $result[$key]['Height']           = Language::getArrayStrict($product->height, $lang);
                    $result[$key]['Width']            = Language::getArrayStrict($product->width, $lang);
                    $result[$key]['Thickness']        = Language::getArrayStrict($product->thickness, $lang);
                    $result[$key]['Section']          = Language::getArrayStrict($product->section, $lang);
                    $result[$key]['Coating']          = Language::getArrayStrict($product->coating, $lang);
                    $result[$key]['View']             = Language::getArrayStrict($product->view, $lang);
                    $result[$key]['Brinell_hardness'] = Language::getArrayStrict($product->brinell_hardness, $lang);
                    $result[$key]['Class']            = Language::getArrayStrict($product->class, $lang);
                }

                $sheet->setWidth([
                    'A' => 10,
                    'B' => 30,
                    'C' => 10,
                    'D' => 10,
                    'E' => 20,
                    'F' => 20,
                    'G' => 20,
                    'H' => 10,
                ]);

                $sheet->fromArray($result, null, 'A1', true);
            });
        })->export('xlsx');

        return redirect('/administration/exel');
    }

    public function import(Request $request)
    {
        $measures = Prices::getMeasures();
        $lang     = $request->input('lang');
        $fileName = $request->file('file')->getClientOriginalName();
        $fileName = str_replace(" ", "_", $fileName);
        $request->file('file')->move('./import/', $fileName);
        $counter = 0;

        Excel::load('./import/' . $fileName, function($reader) use ($measures, &$counter, $lang) {
            foreach ($reader->toArray() as $value) {
                $data = [
                    'id'                  => null,
                    'name'                => null,
                    'description_product' => null,
                    'slug'                => null,
                    'cost'                => null,
                    'unit'                => null,
                    'title'               => null,
                    'description'         => null,
                    'keywords'            => null,
                    'in_stock'            => 0,
                    'steel_grade'         => null,
                    'sawing'              => null,
                    'standard'            => null,
                    'diameter'            => null,
                    'height'              => null,
                    'width'               => null,
                    'thickness'           => null,
                    'section'             => null,
                    'coating'             => null,
                    'view'                => null,
                    'brinell_hardness'    => null,
                    'class'               => null,
                ];

                $value   = array_map('trim', $value);
                $data    = array_merge($data, $value);
                $product = Products::find($data['id']);

                if ($product) {

                    $dataPro['title']            = Language::set($product->title, $data['name'], $lang);
                    $dataPro['description']      = Language::set($product->description, $data['description_product'], $lang);
                    $dataPro['slug']             = str_slug($data['slug'], '-');
                    $dataPro['in_stock']         = $data['in_stock'];

                    $dataPro['steel_grade']      = Language::set($product->steel_grade, $data['steel_grade'], $lang);
                    $dataPro['sawing']           = Language::set($product->sawing, $data['sawing'], $lang);
                    $dataPro['standard']         = Language::set($product->standard, $data['standard'], $lang);
                    $dataPro['diameter']         = Language::set($product->diameter, $data['diameter'], $lang);
                    $dataPro['height']           = Language::set($product->height, $data['height'], $lang);
                    $dataPro['width']            = Language::set($product->width, $data['width'], $lang);
                    $dataPro['thickness']        = Language::set($product->thickness, $data['thickness'], $lang);
                    $dataPro['section']          = Language::set($product->section, $data['section'], $lang);
                    $dataPro['coating']          = Language::set($product->coating, $data['coating'], $lang);
                    $dataPro['view']             = Language::set($product->view, $data['view'], $lang);
                    $dataPro['brinell_hardness'] = Language::set($product->brinell_hardness, $data['brinell_hardness'], $lang);
                    $dataPro['class']            = Language::set($product->class, $data['class'], $lang);

                    if ($product->update($dataPro)) {

                        if ($measures[$data['unit']]) {
                            $dataPri['price'] = $data['cost'];
                            $dataPri['type']  = $data['unit'];
                            $product->price->update($dataPri);
                        }

                        if ($product->metatags) {
                            $dataMet['keywords']    = Language::set($product->metatags->keywords, $data['keywords'], $lang);
                            $dataMet['title']       = Language::set($product->metatags->title, $data['title'], $lang);
                            $dataMet['description'] = Language::set($product->metatags->description, $data['description'], $lang);

                            $product->metatags->update($dataMet);
                        } else {
                            $metatag = new Metatags();
                            $metatag->type = 'product';
                            $metatag->slug = $product->slug;

                            $metatag->keywords    = Language::setEmpty($data['keywords'], $lang);
                            $metatag->title       = Language::setEmpty($data['title'], $lang);
                            $metatag->description = Language::setEmpty($data['description'], $lang);
                            $metatag->h1          = Language::getEmptyJson();
                            $metatag->articles    = Language::getEmptyJson();

                            $metatag->save();
                        }

                        $counter++;
                    }
                }
            }
        });

        session()->flash('success', 'Экспортировано ' . $counter . ' записей.');
        return redirect('/administration/exel');
    }
}
