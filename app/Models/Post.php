<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\Finder;

class Post {
    public static function find($slug) {
        if(!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }
        $post = cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));
        return $post;
    }

    public static function all() {
        $files = File::files(resource_path("posts/"));
        //arrow function
        return array_map(fn($file) => $file->getContents(), $files);
        //normal function
        //  return array_map(function ($file) {
        //      return $file->getContents();
        // }, $files);
    }
}