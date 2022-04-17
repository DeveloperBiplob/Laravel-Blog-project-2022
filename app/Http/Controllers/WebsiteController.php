<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Pages.Website.index');
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
        //
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
        $website = Website::first();
        return view('Backend.Pages.Website.edit', compact('website'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100', 'min:2'],
            'logo' => ['mimes:png,jpg'],
            'address' => ['required', 'string', 'max:100', 'min:2'],
            'email' => ['required', 'email', 'max:100', 'min:2'],
            'phone' => ['required',  'max:11'],
            'facebook' => ['required', 'string', 'max:100', 'min:2'],
            'instagram' => ['required', 'string', 'max:100', 'min:2'],
            'twitter' => ['required', 'string', 'max:100', 'min:2'],
            'behance' => ['required', 'string', 'max:100', 'min:2'],
            'footer' => ['required', 'string', 'max:100', 'min:2'],
        ]);

        if($request->hasFile('logo')){
            $old_logo = $website->logo;
            File::deleteFile($old_logo);

            $website->update([
                'title' => $request->title,
                'slug' => $request->title,
                'logo' => File::upload($request->file('logo'), 'Website'),
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'behacne' => $request->behacne,
                'footer' => $request->footer,
            ]);
        }else{
            $website->update([
                'title' => $request->title,
                'slug' => $request->title,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'behacne' => $request->behacne,
                'footer' => $request->footer,
            ]);
        }

        $this->notificationMessage('Website Details update Successfully!');
        return redirect()->route('admin.website.index');
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
}
