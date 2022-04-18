<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('Backend.Pages.About.index', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::first();
        return view('Backend.Pages.About.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'description' => ['required', 'string', 'min:10'],
            'image' => ['mimes:png,jpg']
        ]);

        if($request->hasFile('image')){
            $old_image = $about->image;
            File::deleteFile($old_image);

            $about->update([
                'description' =>$request->description,
                'image' => File::upload($request->file('image'), 'About')
            ]);

        }else{
            $about->update([
                'description' =>$request->description
            ]);
        }

        $this->notificationMessage('Update About section Successfully.');
        return redirect()->route('admin.about.index');

    }

}
