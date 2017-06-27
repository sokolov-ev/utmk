<?php

namespace App\Console\Commands;

use DB;
use File;
use App\Blog;
use App\Images;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class MigrateImages extends Command
{
    protected $signature = 'migrateimages';

    protected $description = 'Image migration in the database and file structure';

    public function handle()
    {
        $changeType = DB::select("UPDATE `images` SET `type`='blog' WHERE `type` = 'other';");
        $changeType = DB::select("UPDATE `images` SET `type`='products' WHERE `type` = 'product';");

        $blog = Images::where('type', 'blog')->get();
        $old = './public/images/other/';
        $new = './public/images/blog/';

        foreach ($blog as $image) {
            if (file_exists($old . $image->name)) {
                if (! File::move($old . $image->name, $new . $image->name)) {
                    die("Couldn't rename file");
                }
            }
        }

        $blog = Blog::all();

        foreach ($blog as $news) {
            if (!empty($news->image)) {
                $image = new Images();
                $image->name     = $news->image;
                $image->type     = 'blog';
                $image->weight   = 0;
                $image->owner_id = $news->id;
                $image->link     = '';
                $image->text     = '';
                $image->save();
                   $news->body = str_replace("images/other", "images/blog", $news->body);
                   $news->save();
            }
        }

        $news = Blog::first();

        if (!empty($news->image)) {
            $deleteColumn = DB::select("ALTER TABLE `blog` DROP `image`;");
        }
    }
}
