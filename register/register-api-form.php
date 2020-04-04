<?php
session_start();
require '../mail/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['register']))
{
//f($_FILES['fileToUpload']['name']!=null)
//{
	$ext_dea = pathinfo($_FILES['fileToUpload']['name'], PATHINFO_EXTENSION);
//}

$ext_license = pathinfo($_FILES['fileToUpload1']['name'], PATHINFO_EXTENSION);

$billing_first_name = $_POST['billing_first_name'];
$billing_last_name = $_POST['billing_last_name'];
$facility_name = $_POST['billing_company'];
$billing_dea_number = $_POST['billing_dea_number'];

$target_file_licence = "attachments/Licence".time().'.'.$ext_license;
//if($_FILES['fileToUpload']['name']!=null)
//{
	$target_file_dea = "attachments/Dea".time().'.'.$ext_dea;
//}
//else{
	//$target_file_dea = null;
//}
$up_dea_num = $target_file_dea;
$up_license_num = $target_file_licence;


$billing_npi_number = $_POST['billing_npi_number'];
$billing_card_name = $_POST['billing_card_name'];
$billing_ex_date = $_POST['billing_date'];
$billing_card_number = $_POST['billing_card_number'];
$billing_cvv = $_POST['billing_cvv'];

$facility_address_1 = $_POST['facility_address_1'];
$facility_address_2 = $_POST['facility_address_2'];
$facility_city = $_POST['facility_city'];
$facility_state = $_POST['facility_state'];
$facility_country = $_POST['facility_country'];
$facility_postcode = $_POST['facility_postcode'];
$facility_phone = $_POST['facility_phone'];

$billing_address_1 = $_POST['billing_address_1'];
$billing_address_2 = $_POST['billing_address_2'];
$billing_city = $_POST['billing_city'];
$state_select = $_POST['billing_state'];
$billing_country = $_POST['billing_country'];
$postcode = $_POST['postcode'];
$billing_phone = $_POST['billing_phone'];
$reg_email = $_POST['reg_email'];
	if(1)
	{
		$name = $billing_first_name.' '.$billing_last_name;

		$message = 'Practitioner First Name : '.$billing_first_name.'
Practitioner Last Name : '.$billing_last_name.'
Facility Name : '.$facility_name.'
DEA Number : '.$billing_dea_number.'
NPI Number : '.$billing_npi_number.'

Facility Address

Address : '.$facility_address_1.'
Address Line 2 : '.$facility_address_2.'
City : '.$facility_city.'
State : '.$facility_state.'
Country : '.$facility_country.'
Zip : '.$facility_postcode.'
Phone Number : '.$facility_phone.'
Name On Credit Card : '.$billing_card_name.'
Expiration Date : '.$billing_ex_date.'
Card Number : '.$billing_card_number.'
CVV Code : '.$billing_cvv.'

Billing Address

Address : '.$billing_address_1.'
Address Line 2 : '.$billing_address_2.'
City : '.$billing_city.'
State : '.$state_select.'
Country : '.$billing_country.'
Zip : '.$postcode.'
Phone Number : '.$billing_phone.'
Email : '.$reg_email;

//$reg_email="someone@yourwebsite.contact";

		$emailer = new PHPMailer;
		$emailer->SetFrom($reg_email, $name);
		$emailer->Subject   = "New Registration " . $name;
		$emailer->Body      = $message;
		//$emailer->AddAddress( '503B@ASPCARES.COM' );
		$emailer->AddAddress( 'rsagi@aspcares.com' );
		//$emailer->AddAddress( 'laravel@gmicro.us' );

		//if($_FILES['fileToUpload']['name']!=null)
		//{
			$file_to_attach_dea = $_FILES['fileToUpload']['tmp_name'];
			$display_name_dea = "DEA_Number_".$billing_first_name.'_'.$billing_last_name.".".$ext_dea;
		//}
		$file_to_attach_license = $_FILES['fileToUpload1']['tmp_name'];	
		
		$display_name_license = "License_Number_".$billing_first_name.'_'.$billing_last_name.".".$ext_license;
		//if($_FILES['fileToUpload']['name']!=null)
		//{
			$emailer->AddAttachment( $file_to_attach_dea , $display_name_dea );
		//}

		$emailer->AddAttachment( $file_to_attach_license , $display_name_license );
		$emailer->Send();
		//if($_FILES['fileToUpload']['name']!=null)
		//{
			move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_dea);
		//}
		move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file_licence);

		$_SESSION['success'] = "Your data has been sent successfully";
        header('location: /register/');
        // echo "success";
	}
	else{
		$_SESSION['error'] = "Something went wrong.";

		echo "Fail to insert";
	}
}
else{
	header('location: /register/');
}
?>
