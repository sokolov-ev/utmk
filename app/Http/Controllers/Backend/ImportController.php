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

        Excel::create($menu->slug . '_' . $data, function($excel) use ($menu, $lang) {
            $excel->sheet($menu->slug, function($sheet) use ($menu, $lang) {
                $result = [];

                foreach ($menu->products as $key => $product) {
                    $result[$key]['id'] = $product->id;
                    $result[$key]['Name'] = json_decode($product->title, true)[$lang];
                    $result[$key]['Slug'] = $product->slug;
                    $result[$key]['Cost'] = $product->prices[0]['price'];
                    $result[$key]['Unit'] = $product->prices[0]['type'];
                    $result[$key]['Title']       = json_decode($product->metatags['title'], true)[$lang];
                    $result[$key]['Description'] = json_decode($product->metatags['description'], true)[$lang];
                    $result[$key]['Keywords']    = json_decode($product->metatags['keywords'], true)[$lang];

                    $result[$key]['In_stock']    = $product->in_stock;
                    $result[$key]['Steel_grade'] = $product->steel_grade ? $product->steel_grade : ' ';
                    $result[$key]['Sawing']      = $product->sawing;
                    $result[$key]['Standard']    = $product->standard;
                    $result[$key]['Diameter']    = $product->diameter;
                    $result[$key]['Height']      = $product->height;
                    $result[$key]['Width']       = $product->width;
                    $result[$key]['Thickness']   = $product->thickness;
                    $result[$key]['Section']     = $product->section;
                    $result[$key]['Coating']     = $product->coating;
                    $result[$key]['View']        = $product->view;
                    $result[$key]['Brinell_hardness'] = $product->brinell_hardness;
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
                    'id' => null,
                    'name' => null,
                    'slug' => null,
                    'cost' => null,
                    'unit' => null,
                    'title' => null,
                    'description' => null,
                    'keywords' => null,
                    'in_stock' => 0,
                    'steel_grade' => null,
                    'sawing' => null,
                    'standard' => null,
                    'diameter' => null,
                    'height' => null,
                    'width' => null,
                    'thickness' => null,
                    'section' => null,
                    'coating' => null,
                    'view' => null,
                    'brinell_hardness' => null,
                ];

                $value   = array_map('trim', $value);
                $data    = array_merge($data, $value);
                $product = Products::find($data['id']);

                if ($product) {
                    $title = json_decode($product->title, true);
                    $title[$lang] = $data['name'];
                    $dataPro['title']       = json_encode($title, JSON_UNESCAPED_UNICODE);
                    $dataPro['slug']        = str_slug($data['slug'], '-');

                    $dataPro['in_stock']    = $data['in_stock'];
                    $dataPro['steel_grade'] = $data['steel_grade'];
                    $dataPro['sawing']      = $data['sawing'];
                    $dataPro['standard']    = $data['standard'];
                    $dataPro['diameter']    = $data['diameter'];
                    $dataPro['height']      = $data['height'];
                    $dataPro['width']       = $data['width'];
                    $dataPro['thickness']   = $data['thickness'];
                    $dataPro['section']     = $data['section'];
                    $dataPro['coating']     = $data['coating'];
                    $dataPro['view']        = $data['view'];
                    $dataPro['brinell_hardness'] = $data['brinell_hardness'];
                    
                    if ($product->update($dataPro)) {
                        
                        if ($measures[$data['unit']]) {
                            $dataPri['price'] = $data['cost'];
                            $dataPri['type']  = $data['unit'];
                            $product->price->update($dataPri);
                        }
                        
                        if ($product->metatags) {
                            $title = json_decode($product->metatags->title, true);
                            $title[$lang] = $data['title'];
                            $dataMet['title'] = json_encode($title, JSON_UNESCAPED_UNICODE);
                            
                            $description = json_decode($product->metatags->description, true);
                            $description[$lang] = $data['description'];
                            $dataMet['description'] = json_encode($description, JSON_UNESCAPED_UNICODE);

                            $keywords = json_decode($product->metatags->keywords, true);
                            $keywords[$lang] = $data['keywords'];
                            $dataMet['keywords'] = json_encode($keywords, JSON_UNESCAPED_UNICODE);
                            
                            $product->metatags->update($dataMet);
                        } else {
                            $metatag = new Metatags();
                            $metatag->type = 'product';
                            $metatag->slug = $product->slug;
                            
                            $title = ['en' => null, 'ru' => null, 'uk' => null];
                            $title[$lang] = $data['title'];
                            $metatag->title = json_encode($title, JSON_UNESCAPED_UNICODE);

                            $description = ['en' => null, 'ru' => null, 'uk' => null];
                            $description[$lang] = $data['description'];
                            $metatag->description = json_encode($description, JSON_UNESCAPED_UNICODE);

                            $keywords = ['en' => null, 'ru' => null, 'uk' => null];
                            $keywords[$lang] = $data['keywords'];
                            $metatag->keywords = json_encode($keywords, JSON_UNESCAPED_UNICODE);

                            $metatag->h1 = '{"en":"","ru":"","uk":""}';
                            $metatag->articles = '{"en":"","ru":"","uk":""}';

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
