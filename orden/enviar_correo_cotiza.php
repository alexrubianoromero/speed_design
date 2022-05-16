<?php
//los que yo tenia $headers = "MIME-Version: 1.0\r\n"; 
/*
$headers = "Content-type: text/html; charset=iso-8859-1\r\n"; 
$headers .= "From: Motorcycle Room <motorcycleroom@gmail.com>\r\n"; 
*/

$headers .= "From: 	SPEED DESING <speeddesignmotolavadotaller@gmail.com>\r\n"; 
//$headers .= "From: 	MOTO RACING CLUB <cfcamacho2015@gmail.com>\r\n"; 
//$headers .= 'From: Birthday Reminder <birthday@example.com>';
///////////////////$headers .= "Cc:Alex <alexrubianoromero@gmail.com>\r\n";
$headers .= "Cc:copia<speeddesignmotolavadotaller@gmail.com>\r\n";
//$headers .= "Cc: copia123 <alexrubianoromero@gmail.com>\r\n";
////////////////////////////////$headers .= "Bcc: Alex <alexrubianoromero@gmail.com>\r\n"; 

//echo '<br>email'.$_REQUEST['email'];
//mail ("ventas@molecait.com,$email",$asunto,$mensaje,$cabeceras);
//echo 'email '.$email;
//$_REQUEST['email']= 'alexrubianoromero@gmail.com';
//echo '<br>email<br>'.$_REQUEST['email'];
mail($_REQUEST['email'],"MODIFICACION",$body,$headers); 

?>
