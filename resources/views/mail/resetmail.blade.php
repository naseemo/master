

<html>
<body style="width: 800px;margin: 0 auto;padding: 0px;font-family: arial;font-size: 13px;">
<div style="background: #fefefe;padding: 0px;border: 1px solid #ddd;">

<p>Reset password with naseemo</p>

<p>For reset password please click this link <a href="{{$data['message']}}">{{$data['message']}}</a></p>


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