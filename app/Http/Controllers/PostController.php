<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getSubCateogry($id)
     {
        $category = Category::find($id);
        return $category->subCategories;
     }


    public function index()
    {
        $posts = Post::with(['category', 'subCategory'])->latest()->get();
        return view('Backend.Pages.Post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('Backend.Pages.Post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       $file = $request->file('image');

        $post = Post::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'sub_cat_id' => $request->sub_category_id,
            'description' => $request->description,
            'image' => File::upload($file, 'Post')
        ]);

        if ($post) {
            $post->tags()->sync($request->tags);
            // Send mail to subscribers
            // PostSubscriberMail::handle($post);
            $this->notificationMessage();
            return redirect()->route('admin.post.index');
        } else {
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkNameExistOrNot($name)
    {
        $result = Post::whereName($name)->first();
        if($result){
            return response()->json([
                'flag' => 'Exist'
            ]);
        }else{
            return response()->json([
                'flag' => 'Not_Exist'
            ]);
        }


    }

    public function postStatus($slug)
    {
        $post = Post::whereSlug($slug)->first();
        if($post->status == 'Active'){
            $post->update(['status' => 'Inactive']);
        }else{
            $post->update(['status' => 'Active']);
        }

        return redirect()->route('admin.post.index');
    }
}
