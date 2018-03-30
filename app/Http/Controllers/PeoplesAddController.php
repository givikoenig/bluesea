<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use Validator;
use Image;
use Config;

class PeoplesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute должно быть заполнено',
    		];

    		$validator = Validator::make($input,[
    				'name' => 'required|max:255',
    				'position' => 'required|max:255',
    				'text' => 'required|max:100',
    			],$messages);

    		if ($validator->fails()) {
    			return redirect()->route('peoplesAdd')->withErrors($validator)->withInput();
    		}

    		if ($request->hasFile('images')) {
    			
    			$file = $request->file('images');

    			if ($file->isValid()) {
    				
    				$str = str_random(8);

    				$imgname = $str.'.jpg';

    				$img = Image::make($file);

    				$img->fit(Config::get('settings.people_image')['width'],
						Config::get('settings.people_image')['height'])->save(public_path().'/assets/images/'.$imgname);

    				$input['images'] = $imgname;
    			}
    		}

    		$people = new People();

    		$people->fill($input);

    		if ($people->save()) {
    			return redirect('admin')->with('status','Done with new People');
    		}

    	}

    	if (view()->exists('admin.peoples_add')) {
    		

    		$data = [
    			'title' => 'Add SomeOne',
    		];

    		return view('admin.peoples_add', $data);
    	}
    	abort(404);
    }
}
