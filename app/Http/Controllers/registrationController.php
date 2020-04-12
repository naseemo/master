<?php
/*

Project Name:  NASEEMO
Author		:  SHAFEEQ KIZHAKKUM PARAMBAN
Desciption	:  REGISTRATION CONTROLLER

*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Registrations;
use App\Countries;
use App\Locations;
use App\Packages;
use App\Subcategories;
use App\Offerdetails;
use App\Rules\refferalcode;
use DB;
use Socialite;
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
		   
			if(request('offer_code')!=NULL)
			{
				$objOfferdetails = new Offerdetails();
				$count           = $objOfferdetails->where([['off_code',request('offer_code')],['off_status','1']])->count();
				
				if($count>0)
				{
					$arr = $objOfferdetails->where([['off_code',request('offer_code')],['off_status','1']])->first();
					$regObject->reg_offer_id=$arr['id'];
				}
				else
				{
					$request->offer_code=0;
					$this->validate(request(),['offer_code'=>new refferalcode]);
				
			    }
				
			}				
			$regObject->reg_firstname=request('fname');	  
			$regObject->reg_lastname=request('lname');
			$regObject->reg_email=request('email');
			$regObject->reg_password=request('password');
			$regObject->reg_phone=request('phone');
			$regObject->reg_location=request('location');	
			$regObject->google_id=request('google_id');	
			$regObject->facebook_id=request('facebook_id');	
			$regObject->provider_id=request('provider_id');	
			if(request('chknewsoffer')=='on')
			$regObject->reg_newsoffer_status=1;
			if(request('radio_btn')=='true')
			$regObject->reg_type=1;	
			if(request('radio_btn')=='false')
			$regObject->reg_type=2;		
			$regObject->is_social =0;
			$regObject->reg_status =1;
				$package_id=request("package_id");
				$package_arr = Packages::where('id',$package_id)->first();
				
				if($regObject->save())
				{
						   $email=$regObject->reg_email;
						   $head ="Welcome to naseemo";
						   $message="Thank you for registering with naseemo";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$regObject->reg_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
				if($package_arr->price>0)
				{
					
							$params = array(
							'ivp_method'  => 'create',
							'ivp_store'   => '23295',
							'ivp_authkey' => 'nzjnk-DNj4#kK2k6',
							'ivp_cart'    => $regObject->id,
							'ivp_test'    => '1',
							'ivp_amount'  => $package_arr->price,
							'ivp_currency'=> 'AED',
							'ivp_desc'    => 'Member Registrations',
							'return_auth' => 'https://naseemo.com/returnsuccess',
							'return_can'  => 'https://naseemo.com/returncancelled',
							'return_decl' => 'https://naseemo.com/returndecline'
							);
							$ch = curl_init();
							curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
							curl_setopt($ch, CURLOPT_POST, count($params));
							curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
							$results = curl_exec($ch);
							curl_close($ch);
							$results = json_decode($results,true);

							$ref= trim($results['order']['ref']);
							$url= trim($results['order']['url']);
							if (empty($ref) || empty($url)) {
							echo 'Failed to create order';
							}
							else
							{
								$loginArr    = 	$regObject->where([['reg_email',request('email')],['reg_password',request('password')]])->first();
								if(!empty($loginArr))
								{
									$request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
									$request->session()->put('logedstatus','1');
									$request->session()->put('username', $loginArr['reg_firstname']);
									$request->session()->put('email', $loginArr['reg_email']);
									$request->session()->put('location', $loginArr['reg_location']);
									$request->session()->put('userid', $loginArr['id']);
									$request->session()->put('reg_type', $loginArr['reg_type']);
									$request->session()->put('phone', $loginArr['reg_phone']);
									$request->session()->put('package_id', $package_arr->id);
								}
								
								 return redirect($url);
							}
							
				}
				else
				{
				$loginArr    = 	$regObject->where([['reg_email',request('email')],['reg_password',request('password')]])->first();
				
				
				if(!empty($loginArr))
				{
					$request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
					$request->session()->put('logedstatus','1');
					$request->session()->put('username', $loginArr['reg_firstname']);
					$request->session()->put('email', $loginArr['reg_email']);
					$request->session()->put('location', $loginArr['reg_location']);
					$request->session()->put('userid', $loginArr['id']);
					$request->session()->put('reg_type', $loginArr['reg_type']);
					$request->session()->put('phone', $loginArr['reg_phone']);
					$request->session()->put('package_id', $package_arr->id);
					return redirect('welcome');
				}
				}
				//$request->session()->flash('REG-MSG', 'User  Registration Successfulll Please Login.... ');
				//return redirect('login');
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
			if($loginArr['reg_status']==0)
				{
					$request->session()->flash('REG-MSG', 'For account verification please click verification link on your email.!');
			        return redirect('login');
				}
				
		    $request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
			$request->session()->put('logedstatus','1');
			$request->session()->put('username', $loginArr['reg_firstname']);
			$request->session()->put('email', $loginArr['reg_email']);
			$request->session()->put('location', $loginArr['reg_location']);
			$request->session()->put('userid', $loginArr['id']);
			$request->session()->put('reg_type', $loginArr['reg_type']);
			$request->session()->put('phone', $loginArr['reg_phone']);
			return redirect('dashURboard');
		}
		else
		{
			$request->session()->flash('REG-MSG', 'The Username and Password Incorrect....!');
			return redirect()->back()->withInput();
		}
		}
		
	}
	public function forgetUser(Request $request)
	{
		if($request->session()->get('logedstatus')!=1)
		{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		return view('registrations.forget',compact('countries','locations','categories'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'You allready loged with naseemo');
		}
	}
	public function updatePassword(Request $request)
	{
		  $this->validate(request(),['email'=>'email|required'
								  ],
								  ['email.required'=>'Please enter a valid email id']
					   );
					   $email=$request->email;
					   $regObject   = 	new Registrations();
					   $regArr 		= 	$regObject->where([["reg_email",$email],['is_social',0]])->first();
					   if(empty($regArr))
					   {
						   $request->session()->flash('REG-MSG', 'This email not exits with naseemo');
						   return redirect('login');
					   }
					   else
					   {
					   $str	=rand(1000000,10000000);
					   $rndencode=base64_encode($str);
					   $reg = Registrations::find($regArr->id);
					   $reg->forgot_status=$str;
					   if($reg->save())
					   {
						   $message ="https://naseemo.com/resetpassword/".$rndencode;
						   $data=array
						   (
						   'from'=>'no-reply@naseemo.com',
						   'subject'=>'Reset password',
						   'view'=>'mail.resetmail',
						   'message'=>$message
						   );
						   Mail::to($email)->send(new sendMail($data));
						   $request->session()->flash('REG-MSG', 'Password reset link send to your email...');
						   return redirect('login');
						   
					   }
					   }
					   
					   
	}
	public function resetPassword(Request $request)
	{
		$countries= Countries::all();	
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$resetstring        =base64_decode($request->resetstring);
		$regObject   = 	new Registrations();
		$regArr 	=	$regObject->where("forgot_status",$resetstring)->first();
		if(empty($regArr))
		{
			$request->session()->flash('REG-MSG', 'This session is timed out..');
			return redirect('login');
		}
		return view('registrations.reset',compact('countries','locations','categories','regArr'));
	}
	public function resetPasswordSave(Request $request)
	{
		$this->validate(request(),[
		                          'password'=>'required|min:6',
								  'confirm_password'=>'required|same:password'
								  
								  ]
								  
					   );
		$id=$request->user_id;
		$regArr = Registrations::find($id);
		$regArr->reg_password=$request->password;
		$regArr->forgot_status=NULL;
		if($regArr->save())
		{
			$request->session()->flash('REG-MSG', 'You Successfully reset your password .....');
			return redirect('login');
		}
		
	}
	public function logoutUser(Request $request)
	{
		    $request->session()->flash('REG-MSG', 'You Successfully Loged Out .....');
			$request->session()->forget('logedstatus');
			$request->session()->forget('username');
			$request->session()->forget('email');
			$request->session()->forget('location');
			$request->session()->forget('userid');
			$request->session()->forget('reg_type');
			$request->session()->forget('phone');
			$request->session()->forget('package_id');
			$request->session()->forget('ad_id');
			$request->session()->forget('validity');
			$request->session()->forget('ad_type');
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
	
	
	public function updateRegistration(Request $request)
	{
	if(request("status")=="normal")
	{
	$this->validate(request(),[
								  'fname'=>'required',
								  'phone'=>'required',
								  'location'=>'required',
								  //'tagline'=>'required',
								 // 'ad_desc'=>'required'
							  ]
					   );
					   $id=request('id');
					   $regObject  = Registrations::find($id);
					   $regObject->reg_firstname=request('fname');
					   $regObject->reg_lastname=request('lname');
					   $regObject->reg_phone=request('phone');
					   $regObject->reg_location=request('location');
					   $regObject->reg_address=request('address');
					   if(request('radio_btn')=='true')
					   $regObject->reg_type=1;	
					   if(request('radio_btn')=='false')
					   $regObject->reg_type=2;
				       $regObject->reg_tagline=request('tagline');
					   $regObject->reg_tag_description=request('ad_desc');
					   $regObject->reg_facebook=request('facebook');
					   $regObject->reg_linkedin=request('linkedin');
					   $regObject->reg_twitter=request('twitter');
					   $regObject->reg_youtube=request('youtube');
					   $regObject->reg_website=request('website');
					   
						   
						   if($request->file('user_dp')!='' && $request->file('user_dp')!=NULL)
							{
								
							if($files=$request->file('user_dp'))
							{
								$ext=$files->getClientOriginalExtension();
								$name=rand(1111,9999).".".$ext;
								$regObject->reg_photo=$name;
								$path=public_path()."/media";
								$files->move($path,$name);
							}
							}
					  
					   
						   if($request->file('user_logo')!='' && $request->file('user_logo')!=NULL)
							{
							if($files=$request->file('user_logo'))
							{
								$ext=$files->getClientOriginalExtension();
								$name=rand(1111,9999).".".$ext;
								$regObject->reg_logo=$name;
								$path=public_path()."/media";
								$files->move($path,$name);
							}
							}
					   
					   if($regObject->save())
					   {
						   
						   $request->session()->flash('REG-MSG', 'Your Profile updated successfully');
						   return redirect('profiledit');
					   }
	}
	if(request("status")=="password")
	{
		$this->validate(request(),[
								  'new_password'=>'required',
								  'new_cpassword'=>'required|same:new_password'
							  ]
							  ,
								  ['new_cpassword.same'=>'Password and Confirm password must be same']
					   );
					   $id=request('id');
					   $regObject  = Registrations::find($id);
					   $regObject->reg_password=request('new_password');
					   if($regObject->save())
					   {
						   $request->session()->flash('REG-MSG', 'Your Password updated successfully');
						   return redirect('profiledit');
					   }
	}
	}
	
	

	public static function getuserdetails($id)
	{
		$objReg = new Registrations();
		$arr = $objReg->where('id',$id)->first();
		return $arr;
	}
	
	public function socialLogin($social)
	{
		
		return Socialite::driver($social)->redirect();
	}
	public function handleProviderCallback($social,Request $request)
	{
		
		$google_id="";
		$provider_id="";
		$facebook_id="";
		if($social=='google')
		{
		$userSocial=Socialite::driver($social)->stateless()->user();
		$google_id=$userSocial->id;
		$loginArr   = Registrations::where([['google_id',$userSocial->id]])->first();
		}
	    if($social=='twitter')
		{
		$userSocial=Socialite::driver($social)->user();
		$loginArr   = Registrations::where([['reg_email',$userSocial->getEmail()]])->first();	
		}
		if($social=='linkedin')
		{
			if(!empty($_GET["error"]))
				{
				$request->session()->flash('REG-MSG',$_GET["error"]);
				return redirect('login');
				}
			$userSocial=Socialite::driver($social)->stateless()->user();
			$provider_id=$userSocial->id;
			$loginArr   = Registrations::where([['provider_id',$userSocial->id]])->first();
		}
		if($social=='facebook')
		{
			
			if(!empty($_GET["error_code"]))
				{
					$request->session()->flash('REG-MSG',$_GET["error_message"]);
			    return redirect('login');
				}
			$userSocial=Socialite::driver($social)->stateless()->user();
			
			$facebook_id=$userSocial->id;
			
			$loginArr   = Registrations::where([['facebook_id',$userSocial->id]])->first();
		}
		if($loginArr)
		{
			
			$request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
			$request->session()->put('logedstatus', '1');
			$request->session()->put('username', $loginArr['reg_firstname']);
			$request->session()->put('email', $loginArr['reg_email']);
			$request->session()->put('userid', $loginArr['id']);
			$request->session()->put('reg_type', $loginArr['reg_type']);
			$request->session()->put('location', $loginArr['reg_location']);
			$request->session()->put('phone', $loginArr['reg_phone']);
			$password = $loginArr->reg_password;
			$email=$userSocial->getEmail();
		    $name = $userSocial->getName();
			return redirect('');
		}
		else
		{
			
			$regObject  = new Registrations();
			$regObject->reg_firstname =$userSocial->getName();
			$regObject->reg_email =$userSocial->getEmail();
			$regObject->reg_password =rand(15000000,30000000);
			$regObject->google_id =$google_id;
			$regObject->provider_id =$provider_id;
			$regObject->facebook_id =$facebook_id;
			$regObject->is_social =1;
			$regObject->reg_status =1;
			$regObject->reg_location=$request->session()->get('locid');
			if($regObject->save())
			{
			$request->session()->flash('REG-MSG', 'You Successfully Loged in Naseemo....');
			$request->session()->put('logedstatus', '1');
			$request->session()->put('username', $userSocial->getName());
			$request->session()->put('email', $userSocial->getEmail());
			$request->session()->put('userid', $regObject->id);
			$loginArrr   = Registrations::where([['id',$regObject->id]])->first();
			$request->session()->put('reg_type', $loginArrr['reg_type']);
			$request->session()->put('location', $loginArr['reg_location']);
			return redirect('welcome');
			}
			/*
			$countries= Countries::all();	
			$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
			$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
			return view('home.register',['name'=>$userSocial->getName(),'email'=>$userSocial->getEmail(),'google_id'=>$google_id,'provider_id'=>$provider_id,'facebook_id'=>$facebook_id,'countries'=>$countries,'locations'=>$locations,'categories'=>$categories]);
		*/
		}
	}
	
	
}
