<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    return [
      'category_id' => Category::factory(),
      'user_id' => User::factory(),
      'title' => $this->faker->sentence(),
      'slug' => $this->faker->slug(),
      'excerpt' => $this->faker->sentence(),
      'body' => $this->faker->paragraph(),
    ];
  }
}
