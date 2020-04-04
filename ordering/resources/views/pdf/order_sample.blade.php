<!DOCTYPE html>
<html>
<head>
	<title>Form AspCares</title>
	<style type="text/css">
		.col6{
			width: 50%;
		}
		.col12{
			width: 100%;
			clear: both;
		}
		.col8{
			width: 70%;
			display: inline-block;
    		float: left;
		}
		.col4{
			width: 30%;
			display: inline-block;
    		float: left;
		}
		.logo{
			display: block;
			float: left;
		}
		.address{
			display: inline-block;
			float: right;
		}
		.fr{
			float: right;
			text-align: right;
			display: inline-block;
			margin: 0px !important;
		}
		.fr-add{
			float: right;
			text-align: right;
			clear: both;
			font-weight: normal;
		}
		.textfield{
			width: 60%;
			padding: 8px;
			border-bottom: 1px solid #000;
			border-top: none;
			border-right:none;
			border-left: none;
		}
		.ta{
			width: 96%;
		}
		.bill{
			display: block;
			float: left;
		}
		.bill-head{
			
			color: #fff;
			padding:5px;
			background-color: #000;
		}
		.ship{
			display: inline-block;
			float: right;
		}
		.ship-head{
			
			color: #fff;
			padding:5px;
			background-color: #000;
		}
		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 5px;
		}

		.tab-field{
			width: 95%;
			padding: 5px;
		}
		.sign{
			width: 80%;
			padding: 8px;
			border-bottom: 1px solid #000;
			border-top: none;
			border-right:none;
			border-left: none;
		}
		.date{
			width: 70%;
			padding: 8px;
			border-bottom: 1px solid #000;
			border-top: none;
			border-right:none;
			border-left: none;
		}
		.text-center{
			text-align: center;
		}
		.new-class{
			border: none;
			padding: 0;
		}
		.new-class h4{
			border: none;
			padding: 0;
			margin: 2px 0;
			font-weight: normal;
		}
		.new-font {
			border: none;
			padding: 2px;
			margin: 2px 0;
			font-weight: normal;
		}
	</style>
</head>
<body>
	<div class="col12">
		<div class="logo col6">
			<img src="logo.png" alt="logo" style="width: 70%;">
		</div>
		<div class="address col6">
			<h2 class="fr">ORDER FORM</h2>
			<h4 class="fr-add">ASP Cares San Antonio 503B<br/>
				2414 Babcock Rd. Ste. 106<br/>
				San Antonio, TX 78229<br/>
				Ph: (210) 417-4567 Fax: (210) 858-6007<br/>
			</h4>
		</div>
	</div>
	<br>
	<div class="col12">
		<table style="width: 100%;" border="0">
			<tr style="height: 10px;">
				<td class="new-class" style="padding: 2px;"><h4 class="new-font">Order Date : <span>&nbsp;<strong>{{ date('m-d-Y') }}</strong>&nbsp;</span></h4></td>
			</tr>
			<!-- <tr style="height: 10px;">
				<td class="new-class" style="padding: 2px;"><h4 class="new-font">PO Number: <span style="border-bottom: #000 1px solid;">Data</span></h4></td>
			</tr> -->
			<!-- <tr style="height: 10px;">
				<td class="new-class" style="padding: 2px; width: 50%;"><h4 class="new-font">Contact Email: <span style="border-bottom: #000 1px solid;">&nbsp;{{Auth::user()->email}}&nbsp;</span></h4></td>
				<td rowspan="1" class="new-class" style="padding: 2px; width: 50%;"><h4 class="new-font">Customer ID: <span style="border-bottom: #000 1px solid;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></h4></td>
			</tr> -->
		</table>
	</div>
	<br><br>
	<div class="col12">
		<div class="bill col6">
			<table class="">
				<tr style="height: 20px;">
					<th style="background-color: #000000; color: #fff;">BILL TO:</th>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ Auth::user()->company_name }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['billing_address1'] }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['billing_address2'] }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['billing_city'] }} &nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;@if($row['billing_state']!=""){{ $row['billing_state'] }} - {{ $row['billing_zip'] }} @endif&nbsp;</h4></td>
				</tr>
			</table>
		</div>
		<div class="bill col6">
			<table class="">
				<tr style="height: 20px;">
					<th style="background-color: #000000; color: #fff;">SHIP TO:</th>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ Auth::user()->company_name }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['address1'] }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['address2'] }}&nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;{{ $row['city'] }} &nbsp;</h4></td>
				</tr>
				<tr style="height: 20px;">
					<td class="new-class" style="border-bottom: 1px solid #000; padding: 2px;"><h4 class="new-font">&nbsp;@if($row['state']!=""){{ $row['state'] }} - {{ $row['zip'] }} @endif&nbsp;</h4></td>
				</tr>
			</table>
		</div>
	</div>

	
	<div class="col12">
		<br><br>
		<table style="width: 100%;" border="1">
			<tr style="background-color: #000000;">
				<th style="color: #fff;">DRUG NAME / DOSAGE FORM</th>
				<th style="color: #fff;">STRENGTH</th>
				<th style="color: #fff;">QTY / UNIT</th>
				<th style="color: #fff;">QUANTITY</th>
				<th style="color: #fff;">PRICE / UNIT</th>
			</tr>
			<?php echo $row['data']; ?>
		</table>
	</div>
	<br><br>
	<div class="col12">
		<!-- <table border="0">
			<tr style="height: 10px;">
				<td class="new-class"><h4>Signature : </h4></td>
				<td style="width: 50%; border: none; border-bottom: #000 1px solid;"></td>

				<td class="new-class"><h4>Date : </h4></td>
				<td style="width: 30%; border: none; border-bottom: #000 1px solid;"></td>
			</tr>
		</table> -->
	</div>
	<br><br>
	<div class="col12 text-center">
		We appreciate your business!<br>
		Please fax completed form to 1 (888) 413-1021 or email to 503B@aspcares.com<br>
	</div>
	<!-- <div class="col12 text-center">
		<br>
		www.ASPCares.com
		<span class="fr">Revision Date: 12/2018</span>
	</div> -->
</body>
</html>