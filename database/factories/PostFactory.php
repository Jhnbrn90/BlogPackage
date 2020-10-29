<?php

namespace JohnDoe\BlogPackage\Database\Factories;

use JohnDoe\BlogPackage\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->title,
            'body'      => $this->faker->paragraph,
            'author_id' => 999,
            'author_type' => 'Fake\Author',
        ];
    }
}