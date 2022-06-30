<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $post = new Post();
            $post->title = $faker->sentence(3);
            $post->slug = Str::slug($post->title, '-');
            $post->cover_image = $faker->image('storage/app/public/placeholders',600, 300, 'Post',true,true,$post->slug,false);
            $post->content = $faker->text(500);
            $post->save();
        }
    }
}
