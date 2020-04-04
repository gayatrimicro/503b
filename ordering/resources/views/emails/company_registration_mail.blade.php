<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=ISO-8859-1'>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	</head>
	<body>
		<div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Hello {{$name}},
		</div>
		<br>
		<table style='font-family: 'Gotham', 'NotoSans', sans-serif !important;text-align:left; margin-bottom: 55px;' width='50%'>
			<tr>
				<td class='tthead'><strong>Company Name : </strong></td>
				<td > {{$company_name}} </td></tr>
				<tr><td class='tthead'><strong>Email : </strong></td>
				<td > {{$email}} </td></tr>
				<tr><td class='tthead'><strong>Password : </strong></td>
				<td > {{$password}} </td></tr>
			</tr>
			<tr ><td colspan='2' style='margin-bottom:20px;border-width:100px;border-bottom:1px solid black;'></td>
			</tr>
			<br>
		</table>
		<a href="{{ url('/company-login') }}">Click Here</a> to login
	</body>
</html>