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
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, tempora! Vero ut ullam voluptatem similique deleniti mollitia in, reprehenderit amet doloremque fugiat perferendis cum maiores ad voluptatum eligendi illum sed!',
                'image'=> 'storage/Post/default.png'
            ]);
        }
    }
}
