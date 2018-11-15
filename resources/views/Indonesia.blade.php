<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Indonesia</title>

<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<div class="col-lg-4">
			<h2>Laravel 5.5 JQuery Ajax Example</h2>
			{{ Form::open() }}
			<div class="form-group">
				<label for="">Region</label> <select class="form-control"
					name="ptbtregion" id="ptbtregion">
					<option value="0" disable="true" selected="true">=== Select Region
						===</option> @foreach ($ptbtregion as $key => $value)
					<option value="{{$value->id}}">{{ $value->PTBTRegionName }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="">Country</label> <select class="form-control"
					name="ptbtcountry" id="ptbtcountry">
					<option value="0" disable="true" selected="true">=== Select Country
						===</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">State/Province</label> <select class="form-control"
					name="ptbtstprov" id="ptbtstprov">
					<option value="0" disable="true" selected="true">=== Select State /
						Province initial ===</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">City</label> <select class="form-control"
					name="ptbtcity" id="ptbtcity">
					<option value="0" disable="true" selected="true">=== Select City
						===</option>
				</select>
			</div>

			<div class="form-group">
				<label for="">City Entry</label> <input type="text" name="PTBTCity"
					placeholder="Enter City Name">
			</div>
			
			{{ Form::close() }}
		</div>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script type="text/javascript">
      $('#ptbtregion').on('change', function(e){
        console.log(e);
        var PTBTRegionId = e.target.value;
        $.get('/json-ptbtcountry?PTBTRegionId=' + PTBTRegionId,function(data) {
          console.log(data);
          $('#ptbtcountry').empty();
          $('#ptbtcountry').append('<option value="0" disable="true" selected="true">=== Select Country ===</option>');
          $('#ptbtcountry').append('<input name="PTBTRegionId" value="PTBTRegionId Changed"/>');

          $('#ptbtstprov').empty();
          $('#ptbtstprov').append('<option value="0" disable="true" selected="true">=== Select State/Province empty 1 ===</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, ptbtcountryObj){
            $('#ptbtcountry').append('<option value="'+ ptbtcountryObj.id +'">'+ ptbtcountryObj.PTBTCountryName +'</option>');
          })
        });
      });

      $('#ptbtcountry').on('change', function(e){
        console.log(e);
        var PTBTCountryId = e.target.value;
        $.get('/json-ptbtstprov?PTBTCountryId=' + PTBTCountryId,function(data) {
          console.log(data);
          $('#ptbtstprov').empty();
          $('#ptbtstprov').append('<option value="0" disable="true" selected="true">=== Select State / Province empty 2 ===</option>');

          $.each(data, function(index, ptbtstprovObj){
            $('#ptbtstprov').append('<option value="'+ ptbtstprovObj.id +'">'+ ptbtstprovObj.PTBTStProvName +'</option>');
          })
        });
      });

      $('#ptbtstprov').on('change', function(e){
        console.log(e);
        var stprov_id = e.target.value;
        $.get('/json-ptbtcity?PTBTStProvId=' + stprov_id,function(data) {
          console.log(data);
          $('#ptbtcity').empty();
          $('#ptbtcity').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, cityObj){
            $('#ptbtcity').append('<option value="'+ cityObj.id +'">'+ cityObj.PTBTCity +'</option>');
          })
        });
      });


    </script>

</body>
</html>