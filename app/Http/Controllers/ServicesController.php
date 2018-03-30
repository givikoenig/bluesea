<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use Config;

class ServicesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.services')) {
    		
    		$services = Service::orderBy('created_at','desc')->get();

    		$data = [
    			'title' => 'Services',
    			'services' => $services
    		];

    		return view('admin.services', $data);

    	}
    	abort(404);

    	
    }
}
