<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function index()
  {
    return view('posts.index', [
      'posts' => Post::latest()
        ->filter(request(['search', 'category', 'author']))
        ->simplePaginate(6)
        ->withQueryString(),
    ]);
  }

  public function show(Post $post)
  {
    return view('posts.show', ['post' => $post]);
  }

  public function create(Category $category)
  {
    return view('posts.create', ['categories' => $category->all()]);
  }

  public function store()
  {
    $attributes = request()->validate([
      'title' => ['required', ValidationRule::unique('posts', 'title')],
      'excerpt' => ['required'],
      'body' => ['required'],
      'category_id' => ['required', ValidationRule::exists('categories', 'id')],
    ]);


    Post::create([
      ...$attributes,
      'user_id' => auth()->user()->id,
      'slug' => Str::of(request('title'))->slug('-')
    ]);

    return redirect('/')->with('sucess', 'Your post has been published!');
  }
}
