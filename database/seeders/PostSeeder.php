<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            $post = new Post();
            $post->title = $faker->words(4, true);
            $post->content = $faker->text(300);
            $post->slug = Str::of($post->title)->slug('-');
            $post->save();

        }
    }
}
