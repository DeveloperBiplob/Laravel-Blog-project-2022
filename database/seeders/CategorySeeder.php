<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Phone', 'Laptop', 'Computer', 'Book'];

        for($i = 0; $i < count($categories); $i++){
            Category::create([
                'name' => $slug = $categories[$i],
                'slug' => $slug
            ]);
        }
    }
}
