<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

use Validator;

class ServiceEditController extends Controller
{
    //
    public function execute(Service $service, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$service->delete();
    		return redirect('admin')->with('status','Service Deleted');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    				'name' => 'required|max:255',
    				'alias' => 'required|max:255|unique:services,alias,'.$input['id'],
    				'text' => 'required'
    			]);

    		if ($validator->fails()) {
    			return redirect()
    					->route('serviceEdit',['service'=>$input['id']])
    					->withErrors($validator);
    		}

    		$service->fill($input);
            
            if($service->update()) {
                return redirect('admin')->with('status','Страница обновлена');
            }


    	}

    	$old = $service->toArray();

    	if (view()->exists('admin.services_edit')) {
    		
    		$data = [
    			'title' => 'Editing Service '.$old['name'],
    			'data' => $old 
    		];

    		return view('admin.services_edit', $data);
    	}

    }
}
