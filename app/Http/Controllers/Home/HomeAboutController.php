<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Image;

class HomeAboutController extends Controller
{

    public function index(){
        $data = About::find(1);

        return view('frontend.about_page', compact('data'));
    }

    public function edit()
    {
        $data = About::find(1);
        return view('admin.home_slide.home_about', compact('data'));
    }

    public function update(Request $request)
    {
        $data = About::findOrFail($request->id);

        $updates = [
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ];

        if ($request->file('about_image')) {

            $image = $request->file('about_image');
            $nameHex = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_slide/' . $nameHex);
            $savedUrl = 'upload/home_slide/' . $nameHex;
            $updates['about_image'] = $savedUrl;
        }

        $data->update($updates);
        $notification = array(
            'message'=> 'About page updated',
            'alert-type'=>'success'
        );



        return redirect()->back()->with($notification);
    }
}
