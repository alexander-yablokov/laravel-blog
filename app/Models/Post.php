<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post 
{
    use HasFactory;

    public static function find($slug)
    {
        // обработка ошибок
        if (!file_exists($path = resource_path("/posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
            // abort(404);
        }
        return cache()->remember("posts.{$slug}", 5, function () use ($path) {
            return file_get_contents($path);
        });

    }

    public static function all() {
        $files = File::files(resource_path("/posts"));

        return array_map(function($file) {return $file->getContents(); }, $files);
    }
}
