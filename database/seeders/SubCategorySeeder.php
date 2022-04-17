<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_categories = ['PHP', 'HTML', 'JS', 'CSS'];

        for($i = 0; $i < count($sub_categories); $i++){
            SubCategory::create([
                'category_id' => rand(1,4),
                'name' => $slug = $sub_categories[$i],
                'slug' => $slug
            ]);
        }
    }
}
