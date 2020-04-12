<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reportads;
class reportsreasonController extends Controller
{
    public function saveReports(Request $request)
	{
		$objReports = new Reportads();
		$this->validate(request(),[
								  'spam_type'=>'required',
								  'message'=>'required|max:100'
								  ]
					    );
			$objReports->ad_id=$request->ad_id;
			$objReports->reason_id=$request->spam_type;
			$objReports->message=$request->message;
            $objReports->user_id=$request->session()->get('userid');
			
			if($objReports->save())
			{
				return redirect()->back();
				$request->session()->flash('REG-MSG','Reports saved successfully');
			}
	}
}
