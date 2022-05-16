<?php
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/
include('../valotablapc.php');

$sql_correo = "select cli.email as email from $tabla14 o
inner join $tabla4 c on (c.placa = o.placa)
inner join $tabla3 cli on (cli.idcliente=c.propietario)
where o.id = '".$_REQUEST['idorden']."'
";
/////////////////////////
$sql_buscar_factura = "select id_factura,numero_factura,id_orden 
				from $tabla11 
				where id_orden = '".$_REQUEST['idorden']."'  and anulado='0' " ;
$con_fact = mysql_query($sql_buscar_factura,$conexion);
$filas_fac = mysql_num_rows($con_fact);

$arr_fact = mysql_fetch_assoc($con_fact);

//////////////////////////

$consulta_email= mysql_query($sql_correo,$conexion);
$arreglo_email = mysql_fetch_assoc($consulta_email);
$email = $arreglo_email['email'];

$sql_items= "select * from $tabla15 where no_factura =   '".$_REQUEST['idorden']."'  ";

//echo '<br>'.$sql_items;
$consulta_items = mysql_query($sql_items);
$texto_items ='';
$suma_items = '0';
while($items = mysql_fetch_assoc($consulta_items))
{	
 $texto_items = $texto_items.'*'.$items['descripcion'];
 $suma_items += $items['total_item'];
 //echo '<br>'.$items['descripcion'];
}
//echo '<br>'.$texto_items;
//echo '<br>'.$suma_items;
//TRABAJO A REALIZAR : '.$_REQUEST['descripcion'].'
$body = 'SPEED DESIGN

Te informa el avance de tu orden de reparacion

Placa: '.$_REQUEST['placa'].'  Orden No: '.$_REQUEST['orden'].'

Items Reparacion:

'.$texto_items.'	

Valor : $'.number_format($suma_items, 0, ',', '.').' ';
if($filas_fac < 1) //osea si no tiene factura 
{	
$body .= 'https://www.alexrubiano.com/speed_design/orden/orden_imprimir.php?idorden='.$_REQUEST['idorden'].' ';
}
else
{
$body .= 'https://www.alexrubiano.com/speed_design/facturas/factura_imprimir.php?id_factura='.$arr_fact['id_factura'].'';
}


//echo '<br>'.$texto_items;

//echo '<br>body<br>'.$body.'<br>fin de body</br>';
//$body="prueba envio correo";
/*
$cuerpo_correo="crecion de orden";
*/
//////////////////////////////////////////////////////////////////	
/////////////////enviar el correo 
//mail($_REQUEST['email'],'MOTORCYCLE ROOM',$body,$headers); 
include('enviar_correo_items.php');

?>