<?php 
	// var_dump($_POST);
	// exit();
 	 $drug = $_POST["drug_name"];
 	 $strength = $_POST["strength_n"];
 	  $qty = $_POST["qty_no"];
	 $cname = $_POST["co_name"];
	 $pnumber = $_POST["po_number"];
	 $email = $_POST["email_id"];

	 
	 // $location = $_POST["location"];

	 $subject ="Contact Request " . $cname;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: 503b <' . $email .">" ."\r\n";
	
	// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	
	   	$message= "<table border='0' cellpadding='4' cellspacing='4' width='100%'>

	   			  <tr><td style='font-size:1.3em;' colspan='2'><strong>Contact Details</strong></td></tr>
	   			   <tr>
	                   <td align='left' width='35%'><strong>Drug :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $drug ."</td>
	                 </tr>

	                 

	                 <tr>
	                   <td align='left' width='35%'><strong>Strength :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $strength  ."</td>
	                 </tr>
	                  <tr>
	                   <td align='left' width='35%'><strong>Qty :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $qty ."</td>
	                 </tr>


	   			  	<tr>
	                   <td align='left' width='35%'><strong>Contact Name :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $cname ."</td>
	                 </tr>

	   			  	<tr>
	                   <td align='left' width='35%'><strong>Phone Number :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $pnumber ."</td>
	                 </tr>


	                 <tr>
	                   <td align='left' width='35%'><strong>Email :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $email ."</td>
	                 </tr>
	                 
	                 
	               </table>";  
	              
	  	  if(mail("503B@ASPCARES.COM", $subject, $message, $headers))
	  	  {
			// delete the cookie so it cannot sent again by refreshing this page
			setcookie('tntcon','');
			echo "Your enquiry has been sent successfully";
		}
		else{
			echo "error";
		}

		
	  	//$msg = "Your enquiry has been sent successfully.";
	  	
	
?>