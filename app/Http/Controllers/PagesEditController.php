<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

use Validator;

class PagesEditController extends Controller
{
    //
    // public function execute($id) {
	// $page = Page::find($id); // альтернативный вариант без внедрения зависимостей,
	// - используется когда в кач-ве параметра в адресной строке использунется id ( /admin/pages/edit/6 )
    public function execute(Page $page, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$page->delete();

    		return redirect('admin')->with('status','Page Destroyed');

    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[

    				'name' => 'required|max:255',
    				'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
    				'title' => 'required',
    				'text' => 'required'

    			]);

    		if ($validator->fails()) {
    			return redirect()
    					->route('pagesEdit',['page'=>$input['id']])
    					->withErrors($validator);
    		}

    		$page->fill($input);
            
            if($page->update()) {
                return redirect('admin')->with('status','Страница обновлена');
                unset($page);
            }


    	}
    	
    	$old = $page->toArray();

    	if (view()->exists('admin.pages_edit')) {

    		$odd = FALSE;
    		$pages = Page::all();
    		foreach ($pages as $key => $value) {
    			if ($key + 1 == $page->id ){
    				$odd = $page->id;
    				goto foo;
    			} else {
    				$odd = $page->id - $key;
    			}
    		}

    		foo:
    		$data = [
    			'title' => 'Editing Page - '.$old['name'],
    			'data' => $old,
    			'odd' => $odd
    		];

    		return view('admin.pages_edit', $data);

    	}

    }
}
