<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule as ValidationRule;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
  function index()
  {
    return view('admin.posts.index', [
      'posts' => Post::paginate(50)
    ]);
  }

  public function create()
  {
    return view('admin.posts.create', ['categories' => Category::all()]);
  }

  public function store()
  {

    $attributes = request()->validate([
      'title' => ['required', ValidationRule::unique('posts', 'title')],
      'thumbnail' => ['required', 'image'],
      'excerpt' => ['required'],
      'body' => ['required'],
      'category_id' => ['required', ValidationRule::exists('categories', 'id')],
    ]);

    Post::create([
      ...$attributes,
      'user_id' => auth()->user()->id,
      'slug' => Str::of(request('title'))->slug('-'),
      'thumbnail' => request()->file('thumbnail')->store('thumbnails')
    ]);

    return redirect('/')->with('sucess', 'Your post has been published!');
  }

  public function edit(Post $post)
  {
    return view('admin.posts.edit', [
      'post' => $post,
      'categories' => Category::all()
    ]);
  }

  public function update(Post $post)
  {
    $attributes = request()->validate([
      'title' => ['required', ValidationRule::unique('posts', 'title')->ignore($post->id)],
      'thumbnail' => ['image'],
      'excerpt' => ['required'],
      'body' => ['required'],
      'category_id' => ['required', ValidationRule::exists('categories', 'id')],
    ]);

    if (isset($attributes['thumbnail'])) {
      $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    }

    $post->update(
      [
        ...$attributes,
        'slug' => Str::of(request('title'))->slug('-'),
      ]
    );

    return back()->with('sucess', 'Post Updated!');
  }

  public function destroy(Post $post)
  {
    $post->delete();

    return back()->with('sucess', 'The post has been deleted');
  }
}
