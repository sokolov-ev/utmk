<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;
use Language;

class ReferenceSection extends Model
{
    protected $table = 'reference_section';

    protected $fillable = [
        'slug',
        'slug_full_path',
        'title',
        'body_small',
        'body',
        'parent_id',
        'parent_exist',
        'weight',
    ];

    protected $hidden = [];

    protected $dateFormat = 'U';

    ///////////

    public function subsection()
    {
        return $this->hasMany('App\ReferenceSection', 'parent_id', 'id');
    }

    public function section()
    {
        return $this->hasOne('App\ReferenceSection', 'id', 'parent_id');
    }

    public static function getSection($slug)
    {
        $section = ReferenceSection::where('slug', $slug)->first();

        if (empty($section)) {
            $section = new ReferenceSection();

            $section->title      = Language::getEmptyJson();
            $section->body_small = Language::getEmptyJson();
            $section->body       = Language::getEmptyJson();
        }

        $array['id']   = $section->id;
        $array['slug'] = $section->slug;

        $array['title']      = json_decode($section->title, true);
        $array['body_small'] = json_decode($section->body_small, true);
        $array['body']       = json_decode($section->body, true);

        return $array;
    }

    public static function getView($slug)
    {
        $section = ReferenceSection::with('section')->where('slug', $slug)->first();

        if (empty($section)) {
            abort(404);
        }

        if (!empty($section['section'])) {
            $array['parent']['name'] = Language::getArraySoft($section['section']['title']);
            $array['parent']['slug'] = $section['section']['slug_full_path'];
        }

        $array['slug']  = $section['slug_full_path'];
        $array['title'] = Language::getArraySoft($section['title']);
        $array['body']  = Language::getArraySoft($section['body']);
        
        return $array;
    }

    public static function setSection($data) 
    {
        $section = ReferenceSection::where('id', $data['id'])->first();

        if (empty($section)) {
            $section = new ReferenceSection();
        }

        $section->slug       = str_slug($data['slug'], '-');
        $section->title      = json_encode($data['title'], JSON_UNESCAPED_UNICODE);
        $section->body_small = json_encode($data['body_small'], JSON_UNESCAPED_UNICODE);
        $section->body       = json_encode($data['body'], JSON_UNESCAPED_UNICODE);

        return $section->save();
    }

    public static function allSections()
    {
        $result   = [];
        $sections = ReferenceSection::orderBy('weight', 'asc')->get();

        foreach ($sections->toArray() as $key => $section) {
            $result[$key]['id']     = $section['id'];
            $result[$key]['slug']   = $section['slug'];
            $result[$key]['weight'] = $section['weight'];
            $result[$key]['parent'] = $section['parent_id'];

            $result[$key]['name'] = json_decode($section['title'], true)['ru'];
        }

        return $result;
    }

    public static function allView()
    {
        $result   = [];
        $sections = ReferenceSection::with('subsection')
                                    ->where('parent_id', 0)
                                    ->orderBy('reference_section.weight', 'asc')
                                    ->get();

        foreach ($sections->toArray() as $key => $section) {
            $result[$key]['slug_full_path'] = $section['slug_full_path'];

            $result[$key]['title']      = Language::getArraySoft($section['title']);
            $result[$key]['body_small'] = Language::getArraySoft($section['body_small']);

            foreach ($section['subsection'] as $subsection) {
                $temp['slug_full_path'] = $subsection['slug_full_path'];

                $temp['title'] = Language::getArraySoft($subsection['title']);

                $result[$key]['subsection'][] = $temp;
            }
        }

        return $result;   
    }

    public static function formingAdditionalData()
    {
        $sections = ReferenceSection::all();

        foreach ($sections as $section) {

            $parent = array_filter($sections->toArray(), function($innerArray) use ($section) {
                return $innerArray['parent_id'] == $section->id;
            });

            if ($section->parent_id != 0) {
                $slug = array_merge([$section->slug], static::getCatalogSlug($section->parent_id, $sections->toArray(), []));
                $slug = array_reverse($slug);
                $section->slug_full_path = '/'.implode('/', $slug);
            } else {
                $section->slug_full_path = '/'.$section->slug;
            }

            $section->update();
        }
    }

    protected static function getCatalogSlug($id, $catalog, $slug)
    {
        $parent = array_filter($catalog, function($innerArray) use ($id) {
            return $innerArray['id'] == $id;
        });

        if (empty($parent)) {
            return $slug;
        } else {
            $parent = current($parent);
            $slug[] = $parent['slug'];
            return static::getCatalogSlug($parent['parent_id'], $catalog, $slug);
        }
    }
}
