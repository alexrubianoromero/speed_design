<?php
//los que yo tenia $headers = "MIME-Version: 1.0\r\n"; 
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//$headers .= "From: 	SPEED DESING <speeddesignmotolavadotaller@gmail.com>\r\n"; 
$headers .= "From: 	SPEED DESING <speeddesign@alexrubiano.com>\r\n"; 
//$headers .= "From: 	MOTO RACING CLUB <cfcamacho2015@gmail.com>\r\n"; 
//$headers .= 'From: Birthday Reminder <birthday@example.com>';
$headers .= "Cc: SPEED DESING <speeddesign@alexrubiano.com>\r\n";
$headers .= "Cc: SPEED DESING <speeddesignmotolavadotaller@gmail.com>\r\n";
//$headers .= "Cc:arsolution <gerentegeneral@arsolutiontechnology.com>\r\n";
//$headers .= "Cc: MOTO RACING CLUB <alexrubianoromero@gmail.com>\r\n";
//$headers .= "Bcc: Alex <alexrubianoromero@gmail.com>\r\n"; 

//echo '<br>email'.$_REQUEST['email'];
//mail ("ventas@molecait.com,$email",$asunto,$mensaje,$cabeceras);
mail($_REQUEST['email'],"BIENVENIDA",$body,$headers); 

?>
