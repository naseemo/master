<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\Ads_Attributes;
use App\Admin_Login;


class adminController extends Controller
{
    public function index()
	{
		return view('admin.index');
	}
	public function login(Request $request)
	{
		$username = $request->username;
		$password = $request->password;
		$objAdmin = new Admin_Login();
		$userArr  =	$objAdmin->where([['user_name',$username],['password',$password]])->first();
		if(!empty($userArr))
		{
			
			$request->session()->put('adminloged',1);
			$request->session()->put('user_name',$userArr['user_name']);
			return redirect('admin-dashboard');
			
		}
		else
		{
			$request->session()->flash('REG-MSG', 'The Username and Password Incorrect....!');
			return redirect('admin-login');
		}
		
	}
	public function logout(Request $request)
	{
			$request->session()->flash('REG-MSG', 'You Sucessfully Loged Out .....');
			$request->session()->forget('adminloged');
			$request->session()->forget('user_name');
			return redirect('admin-login');
	}
	public function dashboard(Request $request)
	{
	    	
		
	}
	public function adduser(Request $request)
	{
		
	}
	
}
