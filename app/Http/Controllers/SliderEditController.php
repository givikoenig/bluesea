<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;
use Validator;
use Image;
use Config;

class SliderEditController extends Controller
{
    //
    public function execute(Slider $slider, Request $request) {

    	if ($request->isMethod('delete')) {

    		$slider->delete();

    		return redirect('admin')->with('status', 'Slide destroyed');
    	} 


    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');
    		$messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

    		$validator = Validator::make($input,[
               'title' => 'required|max:255',
               'text' => 'max:60',
           ],$messages);
           
           if($validator->fails()) {
               return redirect()
                       ->route('sliderEdit',['slider'=>$input['id']])
                       ->withErrors($validator);
           }

           if($request->hasFile('img')) {
              $file = $request->file('img');
              if ($file->isValid()) {
	           	$str = str_random(8);
				$imgname = $str.'.jpg';
				$img = Image::make($file);
				$img->fit(Config::get('settings.slide_image')['width'],
					Config::get('settings.slide_image')['height'])->save(public_path().'/assets/images/slides/'.$imgname);
				$input['img'] = $imgname;
            	}
	        }
	        else {
	            $input['img'] = $input['old_img'];
	        }
	        unset($input['old_img']);
           
            $slider->fill($input);
            if($slider->update()) {
                return redirect('admin')->with('status','Slider updated');
            }

    	}

    	$old = $slider->toArray();
    	
    	if (view()->exists('admin.sliders_edit')) {

    		$data = [
    			'title' => 'Editing Slide - '.$old['title'],
    			'data' => $old,
    		];

    		return view('admin.sliders_edit',$data);
    	}

    }
}
