<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Phone', 'Laptop', 'Computer', 'Book'];

        for($i = 0; $i < count($tags); $i++){
            Tag::create([
                'name' => $slug = $tags[$i],
                'slug' => $slug
            ]);
        }
    }
}
