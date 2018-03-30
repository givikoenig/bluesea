<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Service;

class ServicesAddController extends Controller
{
    //
	public function execute(Request $request) {

		if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input, [

    				'name' => 'required|max:255',
                    'alias' => 'required|max:255|unique:services',
    				'text' => 'required'

    			]);

    		if ($validator->fails()) {
    			return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
    		}

    		$service = new Service();

    		$service->fill($input);

    		if ($service->save()) {
    			return redirect('admin')->with('status','Done with New Service');
    		}

    	}


		if (view()->exists('admin.services_add')) {
    		
    		$data = [
    			'title' => 'New Service'
    		];

    		return view('admin.services_add', $data);
    	}
    	abort(404);
	}

}
