<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
       /*  $tags = ['Coding', 'Laravel','Css','JS','Vue','SQL' ];

        foreach ($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag->slug = Str::slug($new_tag->name);
            $new_tag->save();
        } */

        for ($i=0; $i < 10; $i++) {
            $new_tag = new Tag();
            $new_tag->name = $faker->word();
            $new_tag->slug = Str::slug($new_tag->name);
            $new_tag->save();
        }
    }
}
