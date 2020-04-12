<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use App\Services;
use App\Ads;
use DB;
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
use App\Registrations;
use App\Winners;
use App\Tickets;
use App\Messages;
use App\Reportsreason;
use App\Departments;
use App\Favourites;
use App\Site_Settings;
use App\Site_Banners;
class messagesController extends Controller
{
    public function savemessage(Request $request)
	{
		$objMessages = new Messages();
		$this->validate(request(),[
								  'buyer_name'=>'required',
								  'message'=>'required|max:100'
								  ],
								  ['buyer_name.required'=>'Please enter sender name']
					    );
				if(request('user_id')=="" && request('user_id')!=NULL)
				{
				$objMessages->mes_user_id=request('user_id');
				$useArr = Registrations::where('id',request('user_id'))->first();
				}
				else
				{
				$objAds = new Ads();
				$adrArr = $objAds->where('id',request('ad_id'))->first();
				$objMessages->mes_user_id=$adrArr->ad_user_id;
				$useArr = Registrations::where('id',$adrArr->ad_user_id)->first();
				}
				if($request->session()->get('logedstatus')==1)
				{
				$objMessages->mes_sender_id=$request->session()->get('userid');
				}
				
			    $objMessages->mes_phone=request('buyer_phone');
				$objMessages->mes_ad_id=request('ad_id');
				$objMessages->mes_name=request('buyer_name');
				$objMessages->mes_message=request('message');
				if($objMessages->save())
				{
						   $email=$useArr->reg_email;
						   $head ="Message notification from naseemo";
						   $message="You have a new message with naseemo";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$useArr->reg_firstname
						   );
						   Mail::to($email)->send(new sendMail($data));
					return redirect('ad_view/'.request('ad_id'));
					
				}
				else
				{
					
					return redirect('ad_view/'.request('ad_id'));
					
				}
	}
	public static function getMessageCount($id)
	{
		$objMessages = new Messages();
		$count = $objMessages->where([['mes_user_id',$id],['mes_status',1]])->count();
		return $count;
		
	}
	public function setMesageValue(Request $request)
	{
		$status = $request->status;
		$arr= $request->arrayName;
		
		if(count($arr)>0)
		{
			for($i=1;$i<count($arr);$i++)
			{
				$objMessage = Messages::find($arr[$i]);
				if($status==2)
				{
				$objMessage->mes_status=0;
				}
			    else
				{
				$objMessage->mes_read_status=$status;
				}
				$objMessage->save();
				
				
			}
			return $status;
		}
		
	}
	public function showMessage(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objMessages = new Messages();
		$countries=Countries::all();
		$mes_id=$request->id;
		$locations= Locations::where('lc_parent',$request->session()->get('contId'))->get();
		$categories=Subcategories::where('subc_parent_id',0)->get()->sortBy('subc_priority');
		$id=$request->session()->get('userid');
		$objReg	=	new Registrations();
		$userArr = $objReg->where('id',$id)->first();
		$mesArr  = $objMessages->where([['mes_user_id',$id],['mes_status',1],['id',$mes_id]])->first();
		return view('home.view_message',compact('locations','countries','categories','userArr','mesArr','id'));
		}
		else
		{
			$request->session()->flash('REG-MSG', 'Please Login with Naseemo....');
			return redirect('login');
		}
	}
	public function savereply(Request $request)
	{
		$this->validate(request(),
		[
		'reply_msg'=>'required|max:100'
		]
		);
		$objMessages = new Messages();
		$objRegistrations = new Registrations();
		$mesArr = $objMessages->where('id',request('mes_id'))->first();
		$useArr = $objRegistrations->where('id',$mesArr->mes_sender_id)->first();
		$objMessages->mes_phone=$useArr->reg_phone;
		$objMessages->mes_ad_id=$mesArr->mes_ad_id;
		$objMessages->mes_name=$useArr->reg_firstname;
		$objMessages->mes_message=request('reply_msg');
		$objMessages->mes_sender_id=$mesArr->mes_user_id;
		$objMessages->mes_user_id=$mesArr->mes_sender_id;
		if($objMessages->save())
				{
					
						   $email=$useArr->reg_email;
						   $head ="Message notification from naseemo";
						   $message="You have a new message with naseemo";
						   $data=array
						   (
						   'from'=>'team-naseemo@naseemo.com',
						   'subject'=>'Team naseemo.com',
						   'view'=>'mail.contactmail',
						   'head'=>$head,
						   'message'=>$message,
						   'name'=>$mesArr->mes_name
						   );
						   Mail::to($email)->send(new sendMail($data));
					
					
		return redirect('mymessage');
				}
	}
}
