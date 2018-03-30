<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// маршруты для пользовательской части
Route::group([], function() {

	//открытая часть пользовательской части
	Route::match(['get','post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
	Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
	Route::get('/service/{alias}',['uses'=>'ServiceController@execute', 'as'=>'service']);
	Route::get('/price/{alias}',['uses'=>'PriceController@execute', 'as'=>'price']);

	// закрытая часть для работы системы аутентификации
	Route::auth();
	Route::get('/logout','Auth\LoginController@logout');

});

// Route::get('/create', function(){
//    App\User::create([
//        'name' => 'SomeName',
//        'email' => 'SomeMail@gmail.com',
//        'login' => 'admin',
//        'password' => bcrypt('SomePassword'),
//    ]);
// });

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {
	//admin
	Route::get('/', function() {
		if (view()->exists('admin.index')) {

			$data = ['title'=> 'Admin panel'];
			return view('admin.index',$data);
		}

	});
	// admin/pages
	Route::group(['prefix'=>'pages'], function() {
		/// admin/pages
		Route::get('/', ['uses'=>'PagesController@execute', 'as'=>'pages']);
		//Для отображения и отправки форм при создании новой страницы
		/// admin/pages/add
		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);
		//Для редактирования контента страницы
		/// admin/pages/edit/2
		Route::match(['get','post','delete'],'/edit/{page}', ['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);

	});

	Route::group(['prefix'=>'galleries'], function() {
		Route::get('/', ['uses'=>'GalleriesController@execute', 'as'=>'galleries']);
		Route::match(['get','post'],'/add',['uses'=>'GalleriesAddController@execute', 'as'=>'galleriesAdd']);
		Route::match(['get','post','delete'],'/edit/{gallery}', ['uses'=>'GalleryEditController@execute', 'as'=>'galleryEdit']);
	});

	Route::group(['prefix'=>'peoples'], function() {
		Route::get('/', ['uses'=>'PeoplesController@execute', 'as'=>'peoples']);
		Route::match(['get','post'],'/add',['uses'=>'PeoplesAddController@execute', 'as'=>'peoplesAdd']);
		Route::match(['get','post','delete'],'/edit/{people}', ['uses'=>'PeopleEditController@execute', 'as'=>'peopleEdit']);
	});

	Route::group(['prefix'=>'services'], function() {
		Route::get('/', ['uses'=>'ServicesController@execute', 'as'=>'services']);
		Route::match(['get','post'],'/add',['uses'=>'ServicesAddController@execute', 'as'=>'servicesAdd']);
		Route::match(['get','post','delete'],'/edit/{service}', ['uses'=>'ServiceEditController@execute', 'as'=>'serviceEdit']);
	});

	Route::group(['prefix'=>'sliders'], function() {
		Route::get('/', ['uses'=>'SlidersController@execute', 'as'=>'sliders']);
		Route::match(['get','post'],'/add',['uses'=>'SlidersAddController@execute', 'as'=>'slidersAdd']);
		Route::match(['get','post','delete'],'/edit/{slider}', ['uses'=>'SliderEditController@execute', 'as'=>'sliderEdit']);
	});

	Route::group(['prefix'=>'testimonials'], function() {
		Route::get('/', ['uses'=>'TestimonialsController@execute', 'as'=>'testimonials']);
		Route::match(['get','post'],'/add',['uses'=>'TestimonialsAddController@execute', 'as'=>'testimonialsAdd']);
		Route::match(['get','post','delete'],'/edit/{testimonial}', ['uses'=>'TestimonialEditController@execute', 'as'=>'testimonialEdit']);
	});

	Route::group(['prefix'=>'prices'], function() {
		Route::get('/', ['uses'=>'PricesController@execute', 'as'=>'prices']);
		Route::match(['get','post'],'/add',['uses'=>'PricesAddController@execute', 'as'=>'pricesAdd']);
		Route::match(['get','post','delete'],'/edit/{price}', ['uses'=>'PricesEditController@execute', 'as'=>'pricesEdit']);

	});



});

Auth::routes();

Route::get('/home', 'HomeController@index');

