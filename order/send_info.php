<?php 
session_start();
$now = time();
 error_reporting(0);

if ($now < $_SESSION['expire']) { 

  $email = $_SESSION['email'];
 }
 else {
  header("Location: /503b/ordering/");
 }
//var_dump($_POST);

$array = array();

 foreach($_POST['cb'] as $row){
 

  
  array_push($array, "<tr>
  <td class='tthead'><strong>Drug Name : </strong></td>                                  
  <td >". $_POST['drugname' . $row]."</td></tr>
  <tr><td class='tthead'><strong>Strength : </strong></td>
  <td >". $_POST['strength' . $row] ."</td></tr>
  <tr><td class='tthead'><strong>Pellet-size : </strong></td>
  <td >". $_POST['pellet-size' . $row] ."</td></tr>
  <tr><td class='tthead'><strong>Quantity : </strong></td>
  <td  class='text-center'>". $_POST['qty' . $row] ."</td></tr>
</tr><tr ><td colspan='2' style='margin-bottom:20px;border-width:100px;border-bottom:1px solid black;'></td></tr><br> ");


}  

$data = implode(" ",$array);
if($_POST){
  
    //echo nl2br($_POST['drugname' . $row] . "  " . $_POST['strength' . $row] . " " . $_POST['pellet-size' . $row] . "  " . $_POST['qty' .$row]  .  "\n");
    
  
  // $drugname = $_POST['drugname' . $row];
  // $strength = $_POST['strength' . $row];
  // $pellet_size = $_POST['pellet-size' . $row];
  // $qty = $_POST['qty' . $row];
			$subject = "503b facility Order request";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Aspcares <askapic@aspcares.com>' . "\r\n";

            $mail= "<html><head><meta http-equiv='Content-Type' content='text/html;charset=ISO-8859-1'><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'></head><body><div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Order request from $email</div><br><table style='font-family: 'Gotham', 'NotoSans', sans-serif !important;text-align:left; margin-bottom: 55px;' width='50%'>
            
              $data
                 </table></body></table>";
                 mail('rsagi@aspcares.com,503b@aspcares.com,connect.leo@gmail.com', $subject, $mail, $headers); 
                 // echo $mail;
                
               
                  // mail('askapic@aspcares.com', $subject, $mail, $headers);
                  // mail('connect.leo@gmail.com', $subject, $mail, $headers);
                  }
                  else{
                  	echo "Fail";
                  }
 
?>