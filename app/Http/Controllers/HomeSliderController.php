<?php

namespace App\Http\Controllers;

use App\home_slider;
use App\Http\Requests\HomeSliderRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.home_slider');
    }


    /**
     * @param HomeSliderRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(HomeSliderRequest $request)
    {

        $this->storeImage($request);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param HomeSliderRequest $request
     */
    private function storeImage(HomeSliderRequest $request)
    {
        $files = $request->file('home_slider');

        $home_slider = new home_slider();

        foreach ($files as $file) {

            $destinationPath = 'home_slider'; // upload path
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $file->move($destinationPath, $fileName); // uploading file to given path
            Image::make('home_slider/' . $fileName)->resize(300, 200)->save();

            $home_slider->image_path = $fileName;
            $home_slider->save();

        }
    }
}
