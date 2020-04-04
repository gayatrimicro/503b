<?php 

	require 'vendor/autoload.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mail with Attacchment</title>
</head>
<body>
	<form method="POST" enctype="multipart/form-data" action="" style="text-align: center;">
		<input type="file" name="attachment" id="newfile" accept="image/*"><br><br>
		<input type="button" name="button" value="Submit">
	</form>
</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
	
	$("#newfile").change(function(e)
	{
		alert($('#newfile').filename );
	});
	// function newfn()
	// {
	// 	var path = document.getElementById("newfile").fileName;
 //            alert(path);
	// 	//alert($('#newfile').val());
	// }
</script>
<?php

if(isset($_POST['button']) && isset($_FILES['attachment']))
{ 
	$email = new PHPMailer;
	$email->SetFrom('you@example.com', 'Your Name'); //Name is optional
	$email->Subject   = 'Message Subject';
	$email->Body      = "BODY";
	$email->AddAddress( 'laravel@gmicro.us' );

	
	$file_to_attach = $_FILES['attachment']['tmp_name'];
	$ext = pathinfo($_FILES['attachment']['name'], PATHINFO_EXTENSION);
	$display_name = "firstname_lastname.".$ext;

	$email->AddAttachment( $file_to_attach , $display_name );

	return $email->Send();
	

	// $from_email		 = 'sender@abc.com'; //from mail, sender email addrress 
	// $recipient_email = 'dotnet@gmicro.us'; //recipient email addrress 
	
	// //Load POST data from HTML form 
	// $subject	 = "Mail with attachment"; //subject for the email 
	// $message	 = "Here is the body part"; //body of the email 
	

	// /*Always remember to validate the form fields like this 
	// if(strlen($sender_name)<1) 
	// { 
	// 	die('Name is too short or empty!'); 
	// } 
	// */
	
	// //Get uploaded file data using $_FILES array 
	// $tmp_name = $_FILES['attachment']['tmp_name']; // get the temporary file name of the file on the server 
	// $name	 = $_FILES['attachment']['name']; // get the name of the file 
	// $size	 = $_FILES['attachment']['size']; // get size of the file for size validation 
	// $type	 = $_FILES['attachment']['type']; // get type of the file 
	// $error	 = $_FILES['attachment']['error']; // get the error (if any) 

	// //validate form field for attaching the file 
	 

	// //read from the uploaded file & base64_encode content 
	// $handle = fopen($tmp_name, "r"); // set the file handle only for reading the file 
	// $content = fread($handle, $size); // reading the file 
	// fclose($handle);				 // close upon completion 

	// $encoded_content = chunk_split(base64_encode($content)); 

	// $boundary = md5("random"); // define boundary with a md5 hashed value 

	// //header 
	// $headers = "MIME-Version: 1.0\r\n"; // Defining the MIME version 
	// $headers .= "From:".$from_email."\r\n"; // Sender Email 
	// //$headers .= "Reply-To: ".$reply_to_email."\r\n"; // Email addrress to reach back 
	// $headers .= "Content-Type: multipart/mixed;\r\n"; // Defining Content-Type 
	// $headers .= "boundary = $boundary\r\n"; //Defining the Boundary 
		
	// //plain text 
	// $body = "--$boundary\r\n"; 
	// $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n"; 
	// $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
	// $body .= chunk_split(base64_encode($message)); 
		
	// //attachment 
	// $body .= "--$boundary\r\n"; 
	// $body .="Content-Type: $type; name=".$name."\r\n"; 
	// $body .="Content-Disposition: attachment; filename=".$name."\r\n"; 
	// $body .="Content-Transfer-Encoding: base64\r\n"; 
	// $body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n"; 
	// $body .= $encoded_content; // Attaching the encoded file with email 
	
	// $sentMailResult = mail($recipient_email, $subject, $body, $headers); 

	// if($sentMailResult ) 
	// { 
	// echo "File Sent Successfully."; 
	// //unlink($name); // delete the file after attachment sent. 
	// } 
	// else
	// { 
	// die("Sorry but the email could not be sent. 
	// 				Please go back and try again!"); 
	// } 
} 

?>