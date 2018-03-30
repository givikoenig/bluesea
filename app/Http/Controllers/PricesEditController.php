<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

use Validator;

class PricesEditController extends Controller
{
    //
    public function execute(Price $price, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$price->delete();

    		return redirect('admin')->with('status','Tariff Destroyed');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		if(isset($request->esupport)) {
    			$input['esupport'] = '1';
    		} else {
    			$input['esupport'] = '0';
    		}

    		if(isset($request->support)) {
    			$input['support'] = '1';
    		} else {
    			$input['support'] = '0';
    		}

    		$validator = Validator::make($input,[

    				'name' => 'required|max:255',
    				'alias' => 'required|max:255|unique:prices,alias,'.$input['id'],
    				'position' => 'required',

    			]);

    		if ($validator->fails()) {
    			return redirect()
    					->route('pricesEdit',['price'=>$input['id']])
    					->withErrors($validator);
    		}

    		$price->fill($input);
    		
            if($price->update()) {
                return redirect('admin')->with('status','Тариф обновлен');
            }

    	}

    	$old = $price->toArray();

    	if (view()->exists('admin.prices_edit')) {
    		
    		$data = [
    			'title' => 'Editing Tariff '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.prices_edit', $data);
    	}

    }
}
