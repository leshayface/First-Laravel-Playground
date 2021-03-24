<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class ArticleFactory extends Factory
{
/**
 * The name of the factory's corresponding model.
 *
 * @var string
 */
protected $model = Article::class;

/**
 * Define the model's default state.
 *
 * @return array
 */
    public function definition()
    {
        return [
		'user_id' =>User::factory(),  // required for relationship to the users table, Also need to include use App\Models\User;  
		'title' => $this->faker->sentence,
		'excerpt' => $this->faker->sentence,
		'body' => $this->faker->paragraph,
        'img_path' => '#',
		// 'img_path' =>$this->$faker->image('/storage/app/public/images',640,480, null, false),
        ];
    }
}