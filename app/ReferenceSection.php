<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App;

class ReferenceSection extends Model
{
    protected $table = 'reference_section';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dateFormat = 'U';

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

        if (!$section) {
            $array['id']   = '';
            $array['slug'] = '';

            $array['title_en'] = '';
            $array['title_ru'] = '';
            $array['title_uk'] = '';

            $array['body_small_en'] = '';
            $array['body_small_ru'] = '';
            $array['body_small_uk'] = '';

            $array['body_en'] = '';
            $array['body_ru'] = '';
            $array['body_uk'] = '';

            return $array;
        }

        $array['id']   = $section->id;
        $array['slug'] = $section->slug;

        $title = json_decode($section->title, true);
        $array['title_en'] = $title['en'];
        $array['title_ru'] = $title['ru'];
        $array['title_uk'] = $title['uk'];

        $bodySmall = json_decode($section->body_small, true);
        $array['body_small_en'] = $bodySmall['en'];
        $array['body_small_ru'] = $bodySmall['ru'];
        $array['body_small_uk'] = $bodySmall['uk'];

        $body = json_decode($section->body, true);
        $array['body_en'] = $body['en'];
        $array['body_ru'] = $body['ru'];
        $array['body_uk'] = $body['uk'];

        return $array;
    }

    public static function getView($slug)
    {
        $section = ReferenceSection::with('section')->where('slug', $slug)->first();

        if (empty($section)) {
            abort(404);
        }

        if (!empty($section['section'])) {
            $title = json_decode($section['section']['title'], true);
            $title = array_filter($title);
            $array['parent']['name'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];
            $array['parent']['slug'] = $section['section']['slug_full_path'];
        }

        $array['slug'] = $section['slug_full_path'];

        $title = json_decode($section['title'], true);
        $title = array_filter($title);
        $array['title'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];

        $body = json_decode($section['body'], true);
        $body = array_filter($body);
        $array['body'] = empty($body[App::getLocale()]) ? current($body) : $body[App::getLocale()];

        return $array;
    }

    public static function setSection($data) 
    {
        $section = ReferenceSection::where('slug', $data['slug'])->first();

        if (!$section) {
            $section = new ReferenceSection();
        }

        $section->slug = $data['slug'];

        $title['en'] = $data['title_en'];
        $title['ru'] = $data['title_ru'];
        $title['uk'] = $data['title_uk'];
        $section->title = json_encode($title, JSON_UNESCAPED_UNICODE);

        $bodySmall['en'] = $data['body_small_en'];
        $bodySmall['ru'] = $data['body_small_ru'];
        $bodySmall['uk'] = $data['body_small_uk'];
        $section->body_small = json_encode($bodySmall, JSON_UNESCAPED_UNICODE);

        $body['en'] = $data['body_en'];
        $body['ru'] = $data['body_ru'];
        $body['uk'] = $data['body_uk'];
        $section->body = json_encode($body, JSON_UNESCAPED_UNICODE);

        return $section->save();
    }

    public static function allSections()
    {
        $result   = [];
        $sections = ReferenceSection::orderBy('weight', 'asc')->get();

        foreach ($sections->toArray() as $key => $section) {
            $result[$key]['id'] = $section['id'];
            $result[$key]['slug'] = $section['slug'];
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

            $title = json_decode($section['title'], true);
            $title = array_filter($title);
            $result[$key]['title'] = empty($title[App::getLocale()]) ? current($title) : $title[App::getLocale()];
    
            $body_small = json_decode($section['body_small'], true);
            $body_small = array_filter($body_small);
            $result[$key]['body_small'] = empty($body_small[App::getLocale()]) ? current($body_small) : $body_small[App::getLocale()];

            foreach ($section['subsection'] as $subsection) {
                $temp['slug_full_path'] = $subsection['slug_full_path'];

                $titleSub = json_decode($subsection['title'], true);
                $titleSub = array_filter($titleSub);
                $temp['title'] = empty($titleSub[App::getLocale()]) ? current($titleSub) : $titleSub[App::getLocale()];

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
