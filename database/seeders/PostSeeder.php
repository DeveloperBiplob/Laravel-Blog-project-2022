<?php

namespace Database\Seeders;

use App\Models\Post;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <=10; $i++){
            Post::create([
                'author' => 1,
                'category_id'=> rand(1,4),
                'sub_cat_id'=> rand(1,4),
                'name' => $slug = Str::random(5),
                'slug' => $slug,
                'description' => Str::random(20),
                'image'=> 'storage/Post/default.png'
            ]);
        }
    }
}
