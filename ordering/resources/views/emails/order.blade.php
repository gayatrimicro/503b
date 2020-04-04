<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=ISO-8859-1'>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	</head>
	<body>
		@if($location != null && $location != "")
		<div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Order request from {{$email}} ( {{$company_name}} for {{$address1}}, {{$city}}),
		</div>
		@else
		<div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Order request from {{$email}} ( {{$company_name}}),
		</div>
		@endif

		<br>
		<table style='font-family: 'Gotham', 'NotoSans', sans-serif !important;text-align:left; margin-bottom: 55px;' width='50%'>
			<?php echo $data1; ?>
		</table>
	</body>
</html>