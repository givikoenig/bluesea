<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Slider;
use Image;
use Config;

class SlidersAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {

    		$input = $request->except('_token');


    		$messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным'
            ];

    		$validator = Validator::make($input, [

    				'img' => 'required|unique:sliders',
    				'title' => 'required|max:255',
    				'text' => 'max:60'

    		],$messages);

    		if ($validator->fails()) {
    			return redirect()->route('slidersAdd')->withErrors($validator)->withInput();
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

            $slider = new Slider();

            $slider->fill($input);

            if ($slider->save()) {
            	return redirect('admin')->with('status','Done with new Slide');
            }

    	}

    	if (view()->exists('admin.sliders_add')) {
    		
    		$data = [
    			'title' => 'New Slide'
    		];

    		return view('admin.sliders_add', $data);
    	}
    	abort(404);
    }
}
