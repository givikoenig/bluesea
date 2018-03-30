<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

class PricesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.prices')) {

    		$prices = Price::orderBy('position','asc')->get();

    		$data = [
				'title' => 'Prices',
				'prices' => $prices
    		];
    		
    		return view('admin.prices', $data);
    	} else {
    		abort(404);
    	}
    }
}
