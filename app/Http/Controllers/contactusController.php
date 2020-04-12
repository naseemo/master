<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Contactus;
class contactusController extends Controller
{
    public function savecontact(Request $request)
		{
			$this->validate(request(),
								  [
								  'name'=>'required',
								  'email'=>'required',
								  'subject'=>'required',
								  'message'=>'required'
								  ]
								  );
								$objContact = new Contactus();
								$objContact->name=$request->name;
								$objContact->email=$request->email;
								$objContact->phone=$request->phone;
								$objContact->department=$request->department;
								$objContact->message=$request->message;
								if($files=$request->file('attachment'))
									{
									$ext=$files->getClientOriginalExtension();
									$name=rand(1111,9999).".".$ext;
									$objContact->attachment=$name;
									$path=public_path()."/media";
									$files->move($path,$name);
									}
								if($objContact->save())
								{
									$email=$request->email;
									$head ="Thanks for contacting with  Naseemo.com";
									$message="We appreciate you contacting with us";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$request->name
						   );
						   Mail::to($email)->send(new sendMail($data));
									$request->session()->flash('REG-MSG','Thank you for contacting with Naseemo');
									return redirect('contact-us');
								}
						
		}
}
