<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('Backend.Pages.Sliders.index', compact('sliders'));
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
            'title' => ['required', 'string', 'min:2', 'max:100', 'unique:sliders,title'],
            'image' => ['required', 'mimes:png,jpg']
        ]);

        Slider::create([
            'title' => $request->title,
            'image' => File::upload($request->file('image'), 'Sliders')
        ]);
        $this->notificationMessage('Slider Added Successfully!');
        return redirect()->route('admin.slider.index');
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
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:2', 'max:100', "unique:sliders,title,{$slider->id}"],
            'image' => ['mimes:png,jpg']
        ]);

        if($request->hasFile('image')){
            $old_image = $slider->image;
            File::deleteFile($old_image);

            $slider->update([
                'title' => $request->title,
                'image' => File::upload($request->file('image'), 'Sliders')
            ]);

        }else{
            $slider->update([
                'title' => $request->title,
            ]);

        }
        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $deleteSlider = $slider->delete();
        if($deleteSlider){
            File::deleteFile($slider->image);
            $this->notificationMessage('Slider Deleted Successfully!');
            return back();
        }
    }

    public function fileUpload($image){

        $file = explode(".", $image);

        $fileName = time() . '_' . uniqid() . '.' . end($file);
        Storage::putFileAs("public/Sliders", $image, $fileName);

        return "storage/Sliders/" . $fileName;
    }
}
