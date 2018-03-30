<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gallery;

class GalleriesController extends Controller
{
    //
    public function execute() {

    	if(view()->exists('admin.galleries')) {

    		$galleries = Gallery::orderBy('created_at','desc')->get();

    		$data = [

    			'title' => 'Gallery',
    			'galleries' => $galleries

    		];

    		return view('admin.galleries', $data);

    	}

    	abort(404);

    }
}
