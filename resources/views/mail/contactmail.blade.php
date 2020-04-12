<html>
<body style="width: 800px;margin: 0 auto;padding: 0px;font-family: arial;font-size: 13px;">
<div style="background: #fefefe;padding: 0px;border: 1px solid #ddd;">
<div style="background: #fcfcfc;padding: 0px 20px 20px;border-bottom: 1px solid #ddd;">
<div style="width:45%; float:left;"><a href="{{URL::to('')}}"><img src="{{ asset('images/logo.png') }}" height="80"></a></div>
<div style="width:50%; float:right; text-align:right; padding-top:30px;"><a style="padding: 10px 30px !important;font-size: 15px;color:#fff !important;background-color:#ff6600 !important;border-color:#CC5C03;box-shadow: 0px 1px 1px 0px #666;border-radius: 2px !important; text-decoration:none;" href="{{URL::to('adPost')}}"><i class="fa fa-plus-circle fa-lg"></i> Post an ad</a></div>
<div style="clear:both;"></div>
</div>

<div style="padding: 20px; min-height:200px;">
<p>Dear {{$data['name']}}</p>
<div style="clear:both; height:5px;"></div>
<h2>{{$data['head']}}</h2>
<p>{{$data['message']}}</p>
<p>Best Regards
<br/><br/>
<b>Naseemo Team</b><br/>
<span style="font-size:11px; color:#666;">Naseemo Middle East FZ LLC</span>
</p>

<ul style="margin: 0;padding: 0;">
	<li style="display: inline-block;"><a href="https://www.facebook.com/NaseemoOnline/" style="border:0; text-decoration:none;"><img src="{{ asset('images/fb.png') }}" height="30" /></a></li>
	<li style="display: inline-block;"><a href="https://twitter.com/NaseemoOnline" style="border:0; text-decoration:none;"><img src="{{ asset('images/twitter.png') }}" height="30" /></a></li>
	<li style="display: inline-block;"><a href="#" style="border:0; text-decoration:none;"><img src="{{ asset('images/gplus.png') }}" height="30" /></a></li>
	<li style="display: inline-block;"><a href="#" style="border:0; text-decoration:none;"><img src="{{ asset('images/youtube.png') }}" height="30" /></a></li>
	<li style="display: inline-block;"><a href="#" style="border:0; text-decoration:none;"><img src="{{ asset('images/rss.png') }}" height="30" /></a></li>
</ul>
<div style="clear:both;"></div>
</div>

<div style="background: #fcfcfc;padding: 10px 20px 10px;border-top: 1px solid #ddd;">
<p style="font-size:11px; color:#666; text-align: justify;">Naseemo.com is one of the leading classifieds website for buyers & sellers in the UAE. It is recently launched in 2019, Naseemo.com is rapidly growing due the unique services it provides to attract users. Naseemo encourages sellers to list any type of either product or services. Not only Used products but New ones have a place in our community. Naseemo was built with a smart categorization solution in order to allow users to list "the right Ad in the Right Place on the Right way".</p>
<p style="font-size:11px; color:#666;">
<?php
use \App\Http\Controllers\pagesController;
$footerlinks=pagesController::getFooterLinks();
?>
<ul style="margin: 0;padding: 0; float:right;">
@foreach($footerlinks as $pages)
	<li style="display: inline-block;"><a href="{{URL::to($pages->page_url)}}" style="color: #333;text-decoration: none;font-size: 11px;">{{$pages->seo_title}}</a></li>
	<li style="display: inline-block;">-</li>
	@endforeach
	
	
	<li style="display: inline-block;"><a href="{{URL::to('contact-us')}}" style="color: #333;text-decoration: none;font-size: 11px;">Contact Us</a></li>
</ul>
</p>
<div style="clear:both;"></div>
</div>

<div style="clear:both;"></div>
</div>
</body>
</html>