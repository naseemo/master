<?php
/*

Project Name:  NASEEMO
Author		:  SHAFEEQ KIZHAKKUM PARAMBAN
Desciption	:  REGISTRATION CONTROLLER

*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registrations;
use App\Countries;
use App\Locations;
use App\Subcategories;
use DB;
class registrationController extends Controller
{
    public function saveRegistration(Request $request)
	{
		$regObject  = new Registrations();
		
		//--------------------------------------SERVER SIDE VALIDATION-------------------------//
		
		$this->validate(request(),['email'=>'email|required|unique:registrations,reg_email',
		                          'password'=>'required|min:6',
								  'confirm_password'=>'required|same:password',
								  'fname'=>'required',
								  'phone'=>'required',
								  'location'=>'required',
								  'terms'=>'required'
								  ],
								  ['terms.required'=>'Please agree to the Terms of Service']
					   );
					   
			$regObject->reg_firstname=request('fname');	  
			$regObject->reg_lastname=request('lname');
			$regObject->reg_email=request('email');
			$regObject->reg_password=request('password');
			$regObject->reg_phone=request('phone');
			$regObject->reg_location=request('location');			
			if(request('chknewsoffer')=='on')
			$regObject->reg_newsoffer_status=1;
			if(request('radio_btn')=='true')
			$regObject->reg_type=1;	
			if(request('radio_btn')=='false')
			$regObject->reg_type=2;		
		
				if($regObject->save())
				{
				$request->session()->flash('REG-MSG', 'User  Registration Successfulll Please Login.... ');
				return redirect('login');
				}					
					  
					  
					  
		
	}
	public function loginUser(Request $request)
	{
		
	
		
		if($request->session()->get('logedstatus')==1)
		{
			$request->session()->flash('REG-MSG', 'You allready loged in naseemo');
			return redirect('login');
	    }
		else
		{
		$regObject   = 	new Registrations();
		$regEmail    = 	request('email');
		$regPassword = 	request('password');
		$loginArr    = 	$regObject->where([['reg_email',$regEmail],['reg_password',$regPassword]])->first();
		if(!empty($loginArr))
		{
		    $request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
			$request->session()->put('logedstatus', '1');
			$request->session()->put('username', $loginArr['reg_firstname']);
			$request->session()->put('userid', $loginArr['id']);
			$request->session()->put('reg_type', $loginArr['reg_type']);
			return redirect('');
		}
		else
		{
			$request->session()->flash('REG-MSG', 'The Username and Password Incorrect....!');
			return redirect('login');
		}
		}
		
		
		
		
		
	}
	public function forgetUser()
	{
		$countries=Countries::all();
		return view('registrations.forget',compact('countries'));
	}
	public function logoutUser(Request $request)
	{
		    $request->session()->flash('REG-MSG', 'You Sucessfully Loged Out .....');
			$request->session()->forget('logedstatus');
			$request->session()->forget('username');
			return redirect('login');
	}
	
	public function PostAjaxPost(Request $request)
	{
		$objLoc    = new Locations();
		$objCountry= new Countries();
		$contryId  = request('contryId');
        $objLocArr = $objLoc->where('lc_parent',$contryId)->get();
		$objConArr = $objCountry->where('id',$contryId)->first();
		$request->session()->put('contrFlag',$objConArr['ct_image']);
		$location=array();
		foreach($objLocArr as $loc)
		{
		$location[]= "<option value='$loc->id' name='loc_$loc->lc_parent' id='loc_$loc->lc_parent'>$loc->lc_name</option>";
		}
		
		return \Response::json($location);
		
	}
	
	
	
	
	
	
	
	
	
}
