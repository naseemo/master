<html>
<head>
<script type="text/javascript" src="{{ asset('plugins/jquery/jquery-2.1.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<script type="text/javascript">
        var plugin_path = 'public/plugins/';
	function show(id)
	{
		$.ajaxSetup({
			headers: 	{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
						});
		   var token="{{ csrf_token() }}";
		   $.ajax({
			

           type:'POST',

           url:"{{ url('/ajax') }}",
		   
           dataType:'HTML',
		   
           data:{contryId:id,_token: token,"_method": 'POST'},

           success:function(data)
		    {
             $("#cities").html(data);
			  
			}

            });
	}

</script>
</head>
<body>
<form name="frm" action="{{ URL::to('photosave') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
<select name="countryId" id="countryId" onChange="show(this.value)">
<option value="1">UAE</option>
<option value="2">Jordan</option>
<option value="3">India</option>
</select>
<select name="cities" id="cities">
<option value="1">122</option>
</select>
<br/>
<br/>
<br/>
<input type="file" name="photos[]" multiple="multiple">
<br/>
<br/>
<br/>
<input type="submit" name="SavePhoto" id="savePhoto">
</form>
</body>

</html>