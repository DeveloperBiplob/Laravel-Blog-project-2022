<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Repository\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    // public function __construct(CategoryInterface $category)
    // {
    //     $this->category = $category;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function faceCategory(){

        return Category::latest()->get();

     }


    public function index()
    {
        // $categories = $this->category->getAllCategory();
        // return view('Backend.Pages.Category.index', compact('categories'));
        return view('Backend.Pages.Category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:categories,name', 'string', 'min:2', 'max:100']
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->name,
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100', "unique:categories,name,{$category->id}"]
        ]);

        $category->update([
            'name' => $request->name
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }
}
