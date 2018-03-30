<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Service;
use App\Gallery;
use App\People;
use App\Price;
use App\Slider;
use App\Testimonial;

use Mail;
use App\Mail\Question;

class IndexController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {

    		$messages = [

    			'required' => "The field :attribute is required",
    			'email' => "The field :attribute is not valid"

    		];
    		
    		$this->validate($request,[

    				'name' => 'required|max:255',
    				'email' => 'required|email',
    				'text' => 'required'

    			], $messages);

    		$data = $request->all();

    		$result = Mail::send('site.email',['data'=>$data], function($message) use ($data) {



    			$mail_admin = 'iv.garin@gmail.com';

    			$message->from($data['email'],$data['name']);
    			$message->to($mail_admin,'Mr.Admin')->subject('Question');

    		});

    		if ($result) {
    			return redirect()->route('home')->with('status','Message sent');
    		}

    	}

    	$pages = Page::all();
    	$galleries = Gallery::take(config('settings.home_arts_count'))->orderBy('created_at','desc')->get();
    	$services = Service::take(config('settings.home_serv_count'))->orderBy('created_at','desc')->get();
    	$peoples = People::take(4)->orderBy('created_at','desc')->get();
    	$prices = Price::take(3)->orderBy('position','asc')->get();
    	$sliders = Slider::all();
    	$testimonials = Testimonial::take(config('settings.home_test_count'))->orderBy('created_at','desc')->get();

    	$menu = array();
    	foreach ($pages as $page) {
    		$item = array('title'=>$page->name, 'alias'=>$page->alias);
    		array_push($menu,$item);
    	}

    	$item = array('title'=>'Services', 'alias'=>'services');
    	array_push($menu,$item);

    	$item = array('title'=>'Gallery', 'alias'=>'gallery');
    	array_push($menu,$item);

    	$item = array('title'=>'Our Team', 'alias'=>'teams');
    	array_push($menu,$item);

    	$item = array('title'=>'Pricing', 'alias'=>'pricing5');
    	array_push($menu,$item);

    	$item = array('title'=>'Testimonials', 'alias'=>'testimonials');
    	array_push($menu,$item);

    	$item = array('title'=>'Contact', 'alias'=>'contact');
    	array_push($menu,$item);

    	return view('site.index',array(

    			'menu' => $menu,
    			'pages' => $pages,
    			'galleries' => $galleries,
    			'services' => $services,
    			'peoples' => $peoples,
    			'prices' => $prices,
    			'sliders' => $sliders,
    			'testimonials' => $testimonials	

    		));


    }
}
