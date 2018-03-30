<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Testimonial;
use Validator;
use Config;

class TestimonialEditController extends Controller
{
    //
    public function execute(Testimonial $testimonial, Request $request) {

    	if ($request->isMethod('delete')) {
    		$testimonial->delete();

    		return redirect('admin')->with('status','Testimonial destroyed');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute должно быть заполнено'
    		];

    		$validator = Validator::make($input,[
    				'name' => 'required|max:255',
    				'text' => 'required|max:255'
    			],$messages);

    		if ($validator->fails()) {
    			return redirect()
    					->route('testimonialEdit',['testimonial' => $input['id']])
    					->withErrors($validator);

    		}

    		$testimonial->fill($input);

    		if ($testimonial->update()) {
    			return redirect('admin')->with('status','Testimonial updated');
    		}

    	}

    	$old = $testimonial->toArray();

    	if (view()->exists('admin.testimonials_edit')) {
    		
    		$data = [
    			'title' => 'Editing Testimonial sent by '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.testimonials_edit', $data);
    	}
    }
}
