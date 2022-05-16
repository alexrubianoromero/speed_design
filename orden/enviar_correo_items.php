<?php
//los que yo tenia $headers = "MIME-Version: 1.0\r\n"; 
//los que yo tenia$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//$email = 'alexrubianoromero@gmail.com';
//$headers .= "From: SPEED DESIGN<speeddesignmotolavadotaller@gmail.com>\r\n"; 
$headers .= "From: 	SPEED DESING <speeddesign@alexrubiano.com>\r\n"; 
//$headers .= 'From: Birthday Reminder <birthday@example.com>';
$headers .= "Cc: SPEED DESING <speeddesign@alexrubiano.com>\r\n";
$headers .= "Cc:  <speeddesignmotolavadotaller@gmail.com>\r\n";
//$headers .= "Cc:JARR <jarr.motos@hotmail.com>\r\n";

//$headers .= "Cc:arsolution <gerentegeneral@arsolutiontechnology.com>\r\n";
////////////////////$headers .= "Cc: Motorcycle Room <motorcycleroom@gmail.com>\r\n";
//////////////////////$headers .= "Bcc: Alex <alexrubianoromero@gmail.com>\r\n"; 
//$email= 'alexrubianoromero@gmail.com';
//echo '<br>'.$email;
//echo '<br>email'.$_REQUEST['email'];
//mail ("ventas@molecait.com,$email",$asunto,$mensaje,$cabeceras);
mail($email,"AVANCE",$body,$headers); 
//echo '****************';
echo 'Se envio correo al cliente indicando el avance de su reparacion';
?>
