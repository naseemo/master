<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tickets;
use App\Luckydraws;
class ticketsController extends Controller
{
    public function checkTickets(Request $request)
	{
		if($request->session()->get('logedstatus')==1)
		{
		$objTickets = new Tickets(); 
		$this->validate(request(),[
								  'coupon'=>'required'
								  ],
								  ['coupon.required'=>'Please enter a valid ticket ..']
					    );
			$ticket = $request->coupon;			
			$ticketArr = $objTickets->where('ticket_no',$ticket)->first();
			if(isset($ticketArr))
			{
				
				$objLuckydraws = new Luckydraws();
				$count = $objLuckydraws->where('ticket_id',$ticketArr->id)->count();
				if($count==0)
				{
				$objLuckydraws->ticket_id=$ticketArr->id;
				$objLuckydraws->user_id=$request->session()->get('userid');
				if($objLuckydraws->save())
				{
				$request->session()->flash('REG-MSG', 'Yes you successfully added to lucky draw');
				}
				
				else
				{
					$request->session()->flash('REG-MSG', 'Error Please try again');
				}
				}
				else
				{
					$request->session()->flash('REG-MSG', 'This ticket allready in luckydraw');
				}
				
			    return redirect('luckydraw');
			}
			else
			{
				$request->session()->flash('REG-MSG', 'This ticket is not valid in this time..');
			    return redirect('luckydraw');
			}
		}

				else
				{
				$request->session()->flash('REG-MSG', 'Please login for submit tickets.');
			    return redirect('login');
				}
			}
}
