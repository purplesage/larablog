<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
  public function store(Post $post)
  {

    request()->validate([
      'body' => 'required'
    ]);

    $post->comments()->create([
      'body' => request('body'),
      'user_id' => auth()->user()->id
    ]);

    return back();
  }
}
