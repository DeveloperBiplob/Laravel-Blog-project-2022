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
            'author' => auth('admin')->user()->id,
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
    public function edit(Post $post)
    {
        $data = [];
        $data['categories'] = Category::latest()->get();
        $data['subCategories'] = SubCategory::latest()->get();
        $data['tags'] = Tag::latest()->get();
        $data['post'] = $post;
        $data['postTags'] = $this->getIDByFunction($post->tags);
        // $data['postTags'] = $post->tags;
        return view('Backend.Pages.Post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // return dd($request->all());
        if($request->has('image')){
            $old_img = $post->image;
            File::deleteFile($old_img);


        $post->update([
            'author' => auth('admin')->user()->id,
            'category_id' => $request->category_id,
            'sub_cat_id' => $request->sub_category_id,
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'image' => File::upload($request->file('image'), 'Post'),
        ]);


        }else{
            $post->update([
                'author' => auth('admin')->user()->id,
                'category_id' => $request->category_id,
                'sub_cat_id' => $request->sub_category_id,
                'name' => $request->name,
                'slug' => $request->name,
                'description' => $request->description
            ]);
        }
        $post->tags()->sync($request->tags);
        $this->notificationMessage('Post Updated Successfully!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $deletePost = $post->delete();
        if($deletePost){
            File::deleteFile($post->image);
            $this->notificationMessage('Post Deleted Successfully!');
            return back();
        }
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

    protected function getIDByFunction($items)
    {
        $ids = [];
        foreach ($items as $id) {
            $ids[] = $id->id;
        }

        return $ids;
    }
}
