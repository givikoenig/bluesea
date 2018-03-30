<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use Validator;
use Image;
use Config;

class PeopleEditController extends Controller
{
    //
	public function execute(People $people ,Request $request) {

		if ($request->isMethod('delete')) {
			$people->delete();
			return redirect('admin')->with('status','People destroyed :)');
		}

		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			$messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];
			
			$validator = Validator::make($input,[
					'name' => 'required|max:255',
					'position' => 'required|max:255',
					'text' => 'required|max:100'
				],$messages);

			if ($validator->fails()) {
				
				return redirect()
						->route('peopleEdit',['people'=>$input['id']])
						->withErrors($validator);
			}

			if($request->hasFile('images')) {
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
	        else {
	            $input['images'] = $input['old_images'];
	        }
	        unset($input['old_images']);

	        $people->fill($input);

	        if ($people->update()) {
	        	return redirect('admin')->with('status','People updated');
	        }
		}

		$old = $people->toArray();

		if (view()->exists('admin.peoples_edit')) {
			
			$data = [
				'title' => 'Editing '.$old['name'],
				'data' => $old
			];

			return view('admin.peoples_edit',$data);
		}
	}
}
