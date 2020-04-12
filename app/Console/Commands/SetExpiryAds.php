<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Locations;
use App\Countries;
use App\Categories;
use App\Subcategories;
use DB;
use App\Ads;
use App\Ads_Attributes;
use App\Attribute_Values;
use App\Packages;
use App\Madeins;
use App\Registrations;
use App\Favourites;
use App\Followers;
class SetExpiryAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expiry:set';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status of every ads with checking their expiry';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arr=Ads::where('ad_status',1)->get();
		foreach($arr as $arr)
	    {
		if($arr->ad_validity==0)
		{
		$userArr=Registrations::where('id',$arr->ad_user_id)->first();
		$packageArr =Packages::where('id',$userArr->package_id)->first();
		if(!empty($packageArr))
		{
			$validity=$packageArr->validity;
		}
		else
		{
			$validity=30;
		}
		}
		else
		$validity=30;
	   $date=date('Y-m-d h:m:s');
	   $created_date=$arr->created_at;
	   $diff=floor( (strtotime($date)-strtotime($created_date)) /(60*60*24));
	   $days=abs($validity)-abs($diff);
	   if($days<=0)
	   {
		   $arrS=Ads::find($arr->id);
		   $arrS->ad_status=0;
		   $arrS->save();
	   }
	   }
    }
}
