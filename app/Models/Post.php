<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post 
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);

    }

    public static function all() {
        $files = File::files(resource_path("/posts"));

        return collect($files)  
        ->map(function($file) {
            return YamlFrontMatter::parseFile($file);
        })
        ->map(function($document) {
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        });
    }
}