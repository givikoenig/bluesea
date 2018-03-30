<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Gallery;
use Image;
use Config;

class GalleriesAddController extends Controller
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

    				'name' => 'required|max:255',
    				'images' => 'required|unique:galleries',

    		],$messages);

    		if ($validator->fails()) {
    			return redirect()->route('galleriesAdd')->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('images')) {
                $file = $request->file('images');

                if ($file->isValid()) {

                $str = str_random(8);

				$imgname = $str.'.jpg';	

				$img = Image::make($file);

				$img->fit(Config::get('settings.gal_image')['width'],
						Config::get('settings.gal_image')['height'])->save(public_path().'/assets/images/portfolio/'.$imgname);

                $input['images'] = $imgname;

            	}

            }

            $gallery = new Gallery();

            $gallery->fill($input);

            if ($gallery->save()) {
            	return redirect('admin')->with('status','Done with new Art');
            }

    	}

    	if (view()->exists('admin.galleries_add')) {
    		
    		$data = [
    			'title' => 'New Art'
    		];

    		return view('admin.galleries_add', $data);
    	}
    	abort(404);

    }
}
