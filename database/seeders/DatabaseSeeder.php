<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $user = User::Factory()->create(['name' => 'David Mendoza']);
    $user2 = User::Factory()->create(['name' => 'Purple Sage']);


    Post::factory(10)->create(['user_id' => $user]);

    Post::factory(20)->create(['user_id' => $user2]);

    comment::factory(5)->create(['post_id' => 30]);
  }
}
