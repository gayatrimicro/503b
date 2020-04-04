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

Route::get('/', function () {
    if(Auth::check())
	{
		if(Auth::user()->user_type == "admin"){
			return redirect('/home');
		}
		elseif(Auth::user()->user_type == "company"){
			//Auth::logout();
			return redirect('/company-dashboard');
		}
	}
	else{		
		return view('welcome');
	}
});

Route::get('/company-login', 'Auth\CompanyLoginController@company_login_form');
Route::post('/company-login', 'Auth\CompanyLoginController@do_company_login');

Route::get('/forgot-password', 'Auth\CompanyLoginController@forgot_password')->name('forgot.password');
Route::post('/company-login', 'Auth\CompanyLoginController@do_company_login');

Auth::routes();

Route::group(['middleware' => 'check-admin'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/products', 'HomeController@products');

	Route::post('/product/create', 'HomeController@add_product');
	Route::post('/product/update', 'HomeController@update_product');
	Route::get('/product/destroy/{id}', 'HomeController@delete_product');
	Route::get('/product/sequence/{sequence}', 'HomeController@product_arrange_in_sequence');

	Route::get('/category', 'HomeController@category');
	Route::post('/category/create', 'HomeController@add_category');
	Route::post('/category/update', 'HomeController@update_category');
	Route::get('/category/destroy/{id}', 'HomeController@delete_category');
	Route::get('/category/sequence/{sequence}', 'HomeController@arrange_in_sequence');

	Route::get('/company', 'HomeController@company');
	Route::post('/company/create', 'HomeController@add_company');
	Route::post('/company/update', 'HomeController@update_company');
	Route::get('/company/destroy/{id}', 'HomeController@delete_company');


	Route::get('/bulk-import', 'HomeController@bulk_upload_form');
	Route::post('/bulk-import', 'HomeController@bulk_upload');

	Route::get('/company-products/{id}', 'HomeController@company_products');
	Route::post('/company-product/create', 'HomeController@add_company_product');
	Route::post('/company-product/update', 'HomeController@update_company_product');
	Route::get('/company-product/destroy/{id}', 'HomeController@delete_company_product');
	Route::get('/company/product/sequence/{sequence}/{comp_id}', 'HomeController@company_product_arrange_in_sequence');

	Route::get('/update_initial_product_sequence', 'HomeController@update_initial_product_sequence');

	Route::post('/company-product/bulk_upload', 'HomeController@bulk_upload_for_my_company_products');

	Route::post('/company/change-password', 'HomeController@company_change_password');
});

Route::group(['middleware' => 'check-company'], function () {
	//Route::get('/', function(){ return redirect('/company-dashboard'); });
	Route::get('/company-dashboard', 'CompanyController@index');
	Route::get('/my-catalog', 'CompanyController@my_catalog');
	Route::post('/do-order', 'CompanyController@do_order');
	Route::post('/do-order/general-products', 'CompanyController@do_order_for_general_products');

	Route::get('/location', 'CompanyController@location');
	Route::post('/location/create', 'CompanyController@add_location');
	Route::post('/location/update', 'CompanyController@update_location');
	Route::get('/location/destroy/{id}', 'CompanyController@delete_location');

	Route::get('/company/product', 'CompanyController@company_my_product');
	Route::post('/company/product/create', 'CompanyController@add_company_my_product');
	Route::post('/company/product/update', 'CompanyController@update_company_my_product');
	Route::get('/company/product/destroy/{id}', 'CompanyController@delete_company_my_product');

	Route::post('/company/product/bulk_upload', 'CompanyController@bulk_upload_for_my_company_products');
});