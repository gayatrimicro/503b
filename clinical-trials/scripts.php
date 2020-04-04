<?php 
	// var_dump($_POST);
	// exit();
 	 $name = $_POST["f_name"];
 	 $email = $_POST["f_email"];
 	 $phone = $_POST["f_phone"];
	 $msg = $_POST["f_msg"];

	 
	 // $location = $_POST["location"];

    $subject ="Contact Request " . $name;
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: 503b <' . $email .">" ."\r\n";

	
	// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	
	   	$message= "<table border='0' cellpadding='4' cellspacing='4' width='100%'>

	   			  <tr><td style='font-size:1.3em;' colspan='2'><strong>Contact Details</strong></td></tr>
	   			   <tr>
	                   <td align='left' width='35%'><strong>Name :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $name ."</td>
	                 </tr>

	                 

	                 <tr>
	                   <td align='left' width='35%'><strong>Email :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $email  ."</td>
	                 </tr>
	                  <tr>
	                   <td align='left' width='35%'><strong>Phone :</strong></td>
	                   <td align='left' width='60%'>
	                   ".  $phone ."</td>
	                 </tr>


	   			  	<tr>
	                   <td align='left' width='35%'><strong>Message :</strong></td>
	                   <td align='left' width='60%'>
	                   ". $msg ."</td>
	                 </tr>

	   			  	
	                 
	                 
	               </table>";  
	              
	  	  if(mail("503B@ASPCARES.COM", $subject, $message, $headers))
	  	  {
			
			setcookie('tntcon','');
			echo "Your enquiry has been sent successfully";
		}
		else{
			echo "error";
		}

		
	  	//$msg = "Your enquiry has been sent successfully.";
	  	
	
?>