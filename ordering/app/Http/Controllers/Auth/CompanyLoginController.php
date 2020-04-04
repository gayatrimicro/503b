<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\HTTP\Request;
use App\User;
use Session;
use Response;
use Redirect;
use Auth;

class CompanyLoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function company_login_form()
	{
		return view('auth.company_login_form');
	}

	public function do_company_login(Request $request)
	{
		$post = $request->all();

		$user_data = ['email' => $post['email'], 'password' => $post['password']];
		if (Auth::attempt($user_data)) {			
			return redirect('/company-dashboard');
		}
		else{
			Session::flash('company_login_error', 'Incorrect credentials');			
			return redirect('/company-login');
		}
	}
}
