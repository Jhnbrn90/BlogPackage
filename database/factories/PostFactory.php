<?php

namespace JohnDoe\BlogPackage\Database\Factories;

use Faker\Generator as Faker;
use JohnDoe\BlogPackage\Models\Post;
use JohnDoe\BlogPackage\Tests\User;

$factory->define(Post::class, function (Faker $faker) {
    $author = factory(User::class)->create();

    return [
        'title'         => $faker->title,
        'body'          => $faker->paragraph,
        'author_id'     => $author->id,
        'author_type'   => get_class($author),
    ];
});