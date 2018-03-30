<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Testimonial;
use Config;

class TestimonialsAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению',
    		];

    		$validator = Validator::make($input, [
    				'name' => 'required|max:255',
    				'text' => 'required|max:255'
    			],$messages);

    		if ($validator->fails()) {
    			return redirect()->route('testimonialsAdd')->withErrors($validator)->withInput();
    		}

    		$testimonial = new Testimonial();

    		$testimonial->fill($input);

    		if ($testimonial->save()) {
    			return redirect('admin')->with('status','Done with new Testimonial');
    		}


    	}

    	if (view()->exists('admin.testimonials_add')) {

    		$data = ['title' => 'Add Testimonial'];
    		
    		return view('admin.testimonials_add', $data);
    	}

    }
}
