<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
  use HasFactory;

  protected $fillable = ['category_id', 'user_id', 'title', 'excerpt', 'body', 'slug'];

  // protected $with = ['category', 'author'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
