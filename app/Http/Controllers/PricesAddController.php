<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Price;

class PricesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input, [

    				'name' => 'required|max:255',
                    'alias' => 'required|max:255|unique:prices',
    				'position' => 'required'

    			]);

    		if ($validator->fails()) {
    			return redirect()->route('pricesAdd')->withErrors($validator)->withInput();
    		}

    		$price = new Price();

    		$price->fill($input);

    		if ($price->save()) {
    			return redirect('admin')->with('status','Done with New Tariff');
    		}

    	}

    	if (view()->exists('admin.prices_add')) {

    		$data = ['title'=>'New Tariff'];

    		return view('admin.prices_add',$data);
    	}

    	abort(404);

    }
}
