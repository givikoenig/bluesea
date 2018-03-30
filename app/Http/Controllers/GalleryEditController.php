<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;
use Validator;
use Image;
use Config;

class GalleryEditController extends Controller
{
    //
    public function execute(Gallery $gallery, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$gallery->delete();

    		return redirect('admin')->with('status','Gallery Destroyed');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');
    		$messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

    		$validator = Validator::make($input,[
               'name' => 'required|max:255',
           ],$messages);
           
           if($validator->fails()) {
               return redirect()
                       ->route('galleryEdit',['gallery'=>$input['id']])
                       ->withErrors($validator);
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
	        else {
	            $input['images'] = $input['old_images'];
	        }
	        unset($input['old_images']);
           
            $gallery->fill($input);
            if($gallery->update()) {
                return redirect('admin')->with('status','Art updated');
            }

    	}

    	$old = $gallery->toArray();
    	
    	if (view()->exists('admin.galleries_edit')) {

    		$data = [
    			'title' => 'Editing Art - '.$old['name'],
    			'data' => $old,
    		];

    		return view('admin.galleries_edit',$data);
    	}

    }
}
