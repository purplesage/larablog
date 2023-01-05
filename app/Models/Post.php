<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

  public $title;

  public $body;

  public $excerpt;

  public $slug;

  public $date;


  public function __construct($title, $body, $excerpt, $slug, $date)
  {

    $this->title = $title;
    $this->body = $body;
    $this->excerpt = $excerpt;
    $this->slug = $slug;
    $this->date = $date;
  }



  static public function all()
  {
    return Cache::rememberForever("posts.all", function () {
      collect(File::files(resource_path('/posts')))->map(
        fn ($file) => YamlFrontMatter::parseFile($file)
      )->map(function ($document) {
        return new Post(
          $document->title,
          $document->body(),
          $document->excerpt,
          $document->slug,
          $document->date,
        );
      })->sortByDesc('date');
    });
  }

  static public function find($slug)

  {
    $post = collect(static::all())->firstWhere('slug', $slug);

    if (!$post) {
      throw new ModelNotFoundException();
    }
    return $post;
  }
}
