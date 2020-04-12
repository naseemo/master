<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertise;
class advertiseController extends Controller
{
    public function saveAdvertise(Request $request)
	{
		
		$objAdvertise = new Advertise();
		$this->validate(request(),[
								  'name'=>'required',
								  'email'=>'required',
								  'phone'=>'required',
								  'message'=>'required',
								  'human' => 'required|in:4',
								  ],
								  ['name.required'=>'Please enter sender name']
					    );
				
			    $objAdvertise->name=request('name');
				$objAdvertise->email_id=request('email');
				$objAdvertise->phone_no=request('phone');
				$objAdvertise->message=request('message');
				if($objAdvertise->save())
				{
					$request->session()->flash('REG-MSG', 'Advertise enquiry added successfully');
					return redirect('advertise');
				}
				else
				{
					$request->session()->flash('REG-MSG', 'Error Please try again');
					return redirect('advertise');
					
				}
	}
}
