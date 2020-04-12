<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;

use App\Newsletters;

class newslettersController extends Controller
{
   public function savenewsletter(Request $request)
   {
	 
	                   
					   $objNews = new Newsletters();
					   $objNews->email=$request->email;
					    
					    
					   if($objNews->save())
					   {
						   $email=request("email");
						   $name= "User";
									$head ="Thanks for subscribing newsletters with  Naseemo.com";
									$message="We appreciate you subscribing newsletters with us";
						   $data=array
						   (
						   'from'=>'newsletter-naseemo@naseemo.com',
						   'subject'=>'subscribing newsletters',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$name
						   );
						   Mail::to($email)->send(new sendMail($data));
									$request->session()->flash('REG-MSG','Thank you for contacting with Naseemo');
									return "<strong>Subsribtion added successfully</strong>";
								}
								else
								{
									return "<strong>Error please try again...</strong>";
								}
					   }
					   
					   
   
}
