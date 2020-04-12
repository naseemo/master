
<div class="col-md-12 nopadding">
<div class="thumbnail text-center hidden-xs">
	@if($userArr->reg_photo!='' && $userArr->reg_photo!=NULL)
	<img src="{{ asset('/media/'.$userArr->reg_photo) }}" alt="" id="userdp" />
	@else
		<img src="{{ asset('images/avatar2.jpg') }}" alt="" id="userdp" />
	@endif
	<h2 class="size-18 margin-top-10 margin-bottom-0">{{Str::ucfirst(Session::get('username'))}}</h2>
	@if(Session::get('reg_type')==1)
	<h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">INDIVIDUAL</h3>
    @endif
	@if(Session::get('reg_type')==2)
		<h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">COMPANY</h3>
	@endif
</div>

<!-- completed -->
<div class="clearboth">
	<label class="nomargin">{{$profile_percentage}}% completed profile <h3 class="size-11 margin-bottom-5 text-muted pull-right">
	<button type="button" class="btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Verified Account" style="color:green;"><i class="fa fa-check size-14"></i></button></h3></label>
	<!-- Success -->
	<div class="progress">
		<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $profile_percentage;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $profile_percentage;?>%">
			<span class="sr-only">{{$profile_percentage}}% Complete (success)</span>
		</div>
	</div>
</div>
<!-- /completed -->
</div>