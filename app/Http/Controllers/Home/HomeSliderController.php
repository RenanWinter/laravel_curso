<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{


    public function index()
    {
        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_index', compact('homeSlide'));
    }

    public function update(Request $request)
    {
        $homeSlide = HomeSlide::findOrFail($request->id);

        $updates = [
            'title'=>$request->title,
            'short_title'=>$request->short_title,
            'video_url'=>$request->video_url
        ];

        if ($request->file('home_slide')) {

            $image = $request->file('home_slide');
            $nameHex = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $nameHex);
            $savedUrl = 'upload/home_slide/' . $nameHex;
            $updates['home_slide'] = $savedUrl;
        }

        $homeSlide->update($updates);
        $notification = array(
            'message'=> 'Slider updated',
            'alert-type'=>'success'
        );



        return redirect()->route('home.slide',compact('homeSlide'))->with($notification);
    }
}
