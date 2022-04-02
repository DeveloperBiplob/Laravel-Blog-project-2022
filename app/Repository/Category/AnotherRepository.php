<?php

namespace App\Repository\Category;

use App\Models\Category;

class AnotherRepository implements CategoryInterface
{
    public function getAllCategory()
    {
        return Category::latest()->limit(3)->get();
    }

    public function store($request)
    {

    }

    public function show(Category $category)
    {

    }

    public function update($request , Category $category)
    {

    }

    public function delete(Category $category)
    {

    }
}
