<ul class="side-nav list-group margin-bottom-60 clearboth" id="sidebar-nav">
	<li class="list-group-item"><a href="{{URL::to('dashURboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="list-group-item active"><a href="{{URL::to('myads')}}"><i class="fa fa-image"></i> Manage Ads</a></li>
	<li class="list-group-item"><a href="{{URL::to('myfavorites')}}"><i class="fa fa-heart"></i> Favorite Ads</a></li>
	<li class="list-group-item"><a href="{{URL::to('mymessage')}}"><i class="fa fa-comments-o"></i> My Messages <span class="badge btn-xs newmessage">{{$countofMessage}}</span></a></li>
	<li class="list-group-item"><a href="{{ URL::to('profiledit')}}"><i class="fa fa-gears"></i> Settings</a></li>
	<li class="list-group-item"><a href="{{URL::to('mytoken')}}"><i class="fa fa-trophy"></i> My Tickets</a></li>
	<li class="list-group-item"><a  href="{{URL::to('logout')}}" onclick="if(confirm('Do you really want to logout ?')){ window.location=''; }"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>