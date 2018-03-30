<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Testimonial;

use Config;

class TestimonialsController extends Controller
{
    //
    public function execute() {


    	if (view()->exists('admin.testimonials')) {

    		$testimonials = Testimonial::orderBy('created_at','desc')->get();
    		
    		$data = [
    		'title' => 'Testimonials',
    		'testimonials' => $testimonials
    		];

    		return view('admin.testimonials', $data);
    	}
    	abort(404);
    }
}
