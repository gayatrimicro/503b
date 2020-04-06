<?php 
	// var_dump($_POST);
	// exit();
 	 $lname = $_POST["san-last-name"];
 	 $fname  = $_POST["san-your-name"];
 	 $address= $_POST["san-address"];
	 $address2 = $_POST["san-address-line-2"];
	 // $city = $_POST["san-city"];
 	 $state  = $_POST["san-menu-state"];
 	 // $country= $_POST["san-billing_country"];
	 $zip = $_POST["san-number-744"];
	 $phone = $_POST["san-number-13"];
 	 $size  = $_POST["san-menu-739"];
 	 $quant= $_POST["san-textarea-887"];
	 // $location = $_POST["location"];

	 $subject ="Hand Sanitizer Request By " . $fname . "" . $lname;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ASP CARES <' . $fname .">" ."\r\n";
	
	// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	
	   	$message= "<table border='0' cellpadding='4' cellspacing='4' width='100%'>

	   			  <tr><td style='font-size:1.3em;' colspan='2'><strong>Contact Details</strong></td></tr>
	   			   <tr>
	                   <td align='left' width='35%'><strong>Name :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $fname . " " . $lname ."</td>
	                 </tr>

	                  <tr>
	                   <td align='left' width='35%'><strong>Address:</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $address . " " . $address2 ."</td>
	                 </tr>

	                 <tr>
	                   <td align='left' width='35%'><strong>State :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $state ."</td>
	                 </tr>


	   			  	<tr>
	                   <td align='left' width='35%'><strong>Zip Code :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $zip ."</td>
	                 </tr>

	   			  	<tr>
	                   <td align='left' width='35%'><strong>Phone :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $phone ."</td>
	                 </tr>

	                 	   			   <tr>
	                   <td align='left' width='35%'><strong>Size :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $size ."</td>
	                 </tr>

	                  <tr>
	                   <td align='left' width='35%'><strong>Quantity :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $quant ."</td>
	                 </tr>

	               </table>";  
	              
	  	  if(mail("content@gmicro.us", $subject, $message, $headers))
			// if(mail("roxanetlowry@gmail.com,seo@gmicro.us", $subject, $message, $headers))
	  	  {
			// delete the cookie so it cannot sent again by refreshing this page
			setcookie('tntcon','');
			echo "Your enquiry has been sent successfully"; 
		}
		// else{
		// 	echo "error";
		// }

		
	  	//$msg = "Your enquiry has been sent successfully.";
	  	
	
?>