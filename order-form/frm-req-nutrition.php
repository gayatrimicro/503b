<?php
// var_dump($_FILES);
// die();

include "../mail/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;


	/*---------*/

	$sbillto = $_POST["nobillto"];
 	$sshipto  = $_POST["noshipto"];
 	$sshipdate = $_POST["nshipdate"];

 	$snq1  = $_POST["nq1"];
 	$snp1  = $_POST["np1"];

 	$snq2  = $_POST["nq2"];
 	$snp2  = $_POST["np2"];

 	$snq3  = $_POST["nq3"];
 	$snp3  = $_POST["np3"];

 	$snq4  = $_POST["nq4"];
 	$snp4  = $_POST["np4"];

 	$snq5  = $_POST["nq5"];
 	$snp5  = $_POST["np5"];

 	$snq6  = $_POST["nq6"];
 	$snp6  = $_POST["np6"];

 	$snq7  = $_POST["nq7"];
 	$snp7  = $_POST["np7"];

 	$snq8  = $_POST["nq8"];
 	$snp8  = $_POST["np8"];

 	$snq9  = $_POST["nq9"];
 	$snp9  = $_POST["np9"];

 	$snq10  = $_POST["nq10"];
 	$snp10  = $_POST["np10"];

 	$snq11  = $_POST["nq11"];
 	$snp11  = $_POST["np11"];

 	$snq12  = $_POST["nq12"];
 	$snp12  = $_POST["np12"];

 	$snq13  = $_POST["nq13"];
 	$snp13  = $_POST["np13"];

 	$snq14  = $_POST["nq14"];
 	$snp14  = $_POST["np14"];

 	$snq15  = $_POST["nq15"];
 	$snp15  = $_POST["np15"];
 	$sncg10  = $_POST["ncg10"];
 	$sncg50  = $_POST["ncg50"];

 	$snq16  = $_POST["nq16"];
 	$snp16  = $_POST["np16"];

 	$snq17  = $_POST["nq17"];
 	$snp17  = $_POST["np17"];

 	$snq18  = $_POST["nq18"];
 	$snp18  = $_POST["np18"];
 	$snohm2  = $_POST["nohm2"];
 	$snohm20  = $_POST["nohm20"];

 	$stb51  = $_POST["ordtbl51"];
 	$stb52  = $_POST["ordtbl52"];
 	$stb53  = $_POST["ordtbl53"];
 	$stb54  = $_POST["ordtbl54"];

 	$stb61  = $_POST["ordtbl61"];
 	$stb62  = $_POST["ordtbl62"];
 	$stb63  = $_POST["ordtbl63"];
 	$stb64  = $_POST["ordtbl64"];

 	$stb71  = $_POST["ordtbl71"];
 	$stb72  = $_POST["ordtbl72"];
 	$stb73  = $_POST["ordtbl73"];
 	$stb74  = $_POST["ordtbl74"];

 	$stb81  = $_POST["ordtbl81"];
 	$stb82  = $_POST["ordtbl82"];
 	$stb83  = $_POST["ordtbl83"];
 	$stb84  = $_POST["ordtbl84"];

 	$stb91  = $_POST["ordtbl91"];
 	$stb92  = $_POST["ordtbl92"];
 	$stb93  = $_POST["ordtbl93"];
 	$stb94  = $_POST["ordtbl94"]; 	

 	$snodby  = $_POST["nodby"];
 	$snodte  = $_POST["nodte"];

	
	$from_mail = "cvo@specialtycareclinics.com";
	$doc_mail = "503b Order Details";

	$message= "<table border='0' cellpadding='4' cellspacing='4' width='100%'>

			   		<tr><td style='font-size:1.8em;' colspan='2'><strong>Order Details</strong></td></tr>
	   			   	<tr>
	                   <td align='left' width='10%' style='border-bottom:1px solid #000;'><strong>Bill To :</strong></td>
	                   <td align='left' width='85%' style='border-bottom:1px solid #000;'>
	                   ".  $sbillto ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='10%' style='border-bottom:1px solid #000;'><strong>Ship To :</strong></td>
	                   <td align='left' width='85%' style='border-bottom:1px solid #000;'>
	                   ".  $sshipto ."</td>
	                </tr>

	   			   	<tr>
	                   <td align='left' width='10%' style='border-bottom:1px solid #000;'><strong>Shipping Date :</strong></td>
	                   <td align='left' width='85%' style='border-bottom:1px solid #000;'>
	                   ".  $sshipdate ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='10%' style='border-bottom:1px solid #000;'><strong>Order By :</strong></td>
	                   <td align='left' width='85%' style='border-bottom:1px solid #000;'>
	                   ".  $snodby ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='10%' style='border-bottom:1px solid #000;'><strong>Date :</strong></td>
	                   <td align='left' width='85%' style='border-bottom:1px solid #000;'>
	                   ".  $snodte ."</td>
	                </tr>
	                </table>
	                <br><br>
	               
	                <table cellspacing='30' width='100%'>
	                <tr><td style='font-size:1.8em;' colspan='2'><strong>Order Table Details</strong></td></tr>

	                <tr>
	                   <th align='left' width='24%' style='font-size:1.1em;border-bottom:1px solid #000;background-color:#ddd;'><strong>DRUG NAME / DOSAGE FORM</strong></th>
	                   <th align='left' width='24%' style='font-size:1.1em;border-bottom:1px solid #000;background-color:#ddd;'><strong>STRENGTH</strong></th>
	                   <th align='left' width='24%' style='font-size:1.1em;border-bottom:1px solid #000;background-color:#ddd;'><strong>QUANTITY</strong></th>
	                   <th align='left' width='24%' style='font-size:1.1em;border-bottom:1px solid #000;background-color:#ddd;'><strong>PRICE (office use only)</strong></th>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Arginine Hydrochloride MDV </td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>200 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq1 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp1 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Ascorbic Acid MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>500 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq2 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp2 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>B-Complex (B1/B2/B3/B5/B6) MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>00/2/100/2/2 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq3 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp3 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Biotin MDV </td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>10 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq4 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp4 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Dexpanthenol MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>250 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq5 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp5 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Edetate Calcium Disodium MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>300 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq6 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp6 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Glutathione MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>200 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq7 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp7 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Methionine/Inositol/Choline Chloride/Cyanocobalamin MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>25/50/50/1 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq8 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp8 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Methylcobalamin MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>1 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq9 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp9 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Pyridoxine HCl MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>100 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq10 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp10 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Taurine MDV </td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>50 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq11 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp11 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Testosterone Cypionate (Grapeseed Oil) MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>200 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq12 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp12 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Zinc (Sulfate) MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>2.5 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq13 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp13 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Magnesium Chloride MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>200 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq14 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp14 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Calcium Gluconate SDV ".  $sncg10 ." , ".  $sncg50 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>10%</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq15 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp15 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Folic Acid MDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>5 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq16 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp16 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Ketorolac Tromethamine SDV</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>30 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq17 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp17 ."</td>
	                </tr>

	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>Ondansetron HCl MDV ".  $snohm2 ." , ".  $snohm20 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>2 mg/mL</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snq18 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $snp18 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb51 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb52 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb53 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb54 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb61 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb62 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb63 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb64 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb71 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb72 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb73 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb74 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb81 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb82 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb83 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb84 ."</td>
	                </tr>
	                <tr>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb91 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb92 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb93 ."</td>
	                   <td align='left' width='24%' style='border-bottom:1px solid #000;'>".  $stb94 ."</td>
	                </tr>

					 
				   </table>";


				   

$mail = new PHPMailer(true);

try {
//From email address and name
$mail->From = $from_mail;
$mail->FromName = $doc_mail;

//To address and name
$mail->addAddress("orders503b@aspcares.com", "User Details");
// $mail->addAddress("fe@gmicro.us", "User Details");

	// var_dump($_POST);
	// exit();

// $mail->isSMTP();                                         
// $mail->Host       = 'smtp.gmail.com';                   
// $mail->SMTPAuth   = true;                                   
// $mail->Username   = 'business@ibridgedigital.com';                   
// $mail->Password   = 'command55$';                            
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
// $mail->Port       = 587;
// $mail->isHTML(true);

// var_dump($_POST);
	// exit();
$mail->isSMTP();                                            // Send using SMTP
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; 
$mail->SMTPSecure = 'tls';         							// Enable TLS encryption; 
$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
$mail->Port       = 587;
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
//$mail->Username   = 'business@ibridgedigital.com';                     // SMTP username
//$mail->Password   = 'command55$';                               // SMTP password
$mail->Username   = 'cvo@specialtycareclinics.com';                     // SMTP username
//$mail->Password   = 'JaiMata$di@';                               // SMTP password`PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Password   = 'SCC!@345';                               // SMTP password`PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->setFrom('cvo@specialtycareclinics.com');

$mail->Subject = "Appointment Form";
$mail->Body = $message;

	$mail->send();
	 // $location = $_POST["location"];

	 
	
	// $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	// $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
	
		 
				  
		//if(mail("content@gmicro.us, fe@gmicro.us", $subject, $message, $headers))
		echo "Your enquiry has been sent successfully..";
	} catch (Exception $e) {
		echo $e;
		echo "Something went wrong";	 
		}

		
		//$msg = "Your enquiry has been sent successfully.";
		
	
?>