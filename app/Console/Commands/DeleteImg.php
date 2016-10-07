<?php

namespace App\Console\Commands;

use App\Images;
use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class DeleteImg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-img';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removal of all unused images';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $directory = './public/images/products/';
        $dir = new \DirectoryIterator($directory);

        foreach ($dir as $file) {
            if ($file->isFile()) {
                $imageDB = Images::where('name', $file->getFilename())->first();

                if(empty($imageDB)) {
                    unlink($directory.$file->getFilename());
                } else {
                    $ext  = $file->getExtension();
                    $name = str_slug($file->getBasename(".".$ext), '_').".".$ext;

                    $imageDB->name = $name;
                    if ($imageDB->save()) {
                        rename($directory.$file->getFilename(), $directory.$name);
                    }
                }
            }
        }
    }
}
