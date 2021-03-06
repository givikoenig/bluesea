<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Page;

class PagesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input, [

    				'name' => 'required|max:255',
    				'alias' => 'required|unique:pages|max:255',
    				'text' => 'required'

    			]);

    		if ($validator->fails()) {
    			return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
    		}

    		$page = new Page();

    		// $page->unguard(); //алтьернатива protected $fillable в модели
    		$page->fill($input);

    		if ($page->save()) {
    			return redirect('admin')->with('status','Done with New Page');
    		}

    	}

    	if (view()->exists('admin.pages_add')) {

    		$odd = count(Page::all());
    		
    		$data = ['title'=>'New Page','odd'=>$odd];

    		return view('admin.pages_add',$data);
    	}

    	abort(404);

    }
}
