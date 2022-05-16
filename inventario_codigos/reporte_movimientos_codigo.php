<?php
session_start();
/*
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
*/
include('../valotablapc.php');
include('../funciones.php');
$datos_codigo = consulta_assoc($tabla12,'id_codigo',$_REQUEST['id_codigo'],$conexion);
?>

<!DOCTYPE html>
<html lang="es"  class"no-js">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<? include("../empresa.php"); ?>
<Div id="contenidos">
		<header>
			<h2><? echo $empresa; ?></h2>
			<h3><? echo $slogan; ?><h3>
		</header>
	
</Div>
<?php
$sql_movimientos_item_orden = "select * from $tabla15 where codigo =   '".$datos_codigo['codigo_producto']."' and id_empresa = '".$_SESSION['id_empresa']."' ";
//echo '<br><br>consulta<br>'.$sql_movimientos_item_orden;
$consulta_movimientos_orden = mysql_query($sql_movimientos_item_orden,$conexion);
$filas_movimientos_orden = mysql_num_rows($consulta_movimientos_orden);




//$datos= get_table_assoc($consulta_movimientos);

//draw_table($datos);
//include('../colocar_links2.php');


$total_salidas= 0;

echo 'SALIDAS ORDENES';
echo '<table border = "1"  width="95%" >';
echo '<tr>';
echo '<td>CODIGO</td>';
echo '<td>ORDEN</td>';
echo '<td align="right">CANTIDAD</td>';
echo '</tr>';
if ($filas_movimientos_orden  > 0 )
{ 
 while($mov = mysql_fetch_assoc($consulta_movimientos_orden))
 	{
	$datos_orden = consulta_assoc($tabla14,'id',$mov['no_factura'],$conexion) ;  
	//echo $descripcion;
	 echo '<tr>';
	 echo '<td>'.$mov['codigo'].'</td>';
	  echo '<td>'.$datos_orden ['orden'].'</td>';
	 echo '<td align="right">'.$mov['cantidad'].'</td>';
	 echo '</tr>';
	 $total_salidas = $total_salidas + $mov['cantidad'];
	 
	}// fin de while 
}// fin de if filas_movimientos 
echo '<table>';
////////////////////////////////////////////////////////////
$sql_movimientos_item_facturas_sin_orden  = "select * from $tabla100 where codigo =  '".$datos_codigo['codigo_producto']."' 
and id_empresa = '".$_SESSION['id_empresa']."' ";
$consulta_movimientos_fact_sin_orden = mysql_query($sql_movimientos_item_facturas_sin_orden,$conexion);

//echo '<br>'.$sql_movimientos_item_facturas_sin_orden;
$filas_movimientos_fact_sin_orden = mysql_num_rows($consulta_movimientos_fact_sin_orden);

echo '<br><br>';
echo 'SALIDAS FACTURAS DIRECTAS';
echo '<table border = "1"  width="95%" >';
echo '<tr>';
echo '<td>CODIGO</td>';
echo '<td>FACTURA</td>';
echo '<td align="right">CANTIDAD</td>';
echo '</tr>';
if ($filas_movimientos_fact_sin_orden  > 0 )
{ 
 while($mov = mysql_fetch_assoc($consulta_movimientos_fact_sin_orden))
 	{
	$datos_orden = consulta_assoc($tabla11,'id_factura',$mov['no_factura'],$conexion) ;  
	//echo $descripcion;
	 echo '<tr>';
	 echo '<td>'.$mov['codigo'].'</td>';
	  echo '<td>'.$datos_orden ['numero_factura'].'</td>';
	 echo '<td align="right">'.$mov['cantidad'].'</td>';
	 echo '</tr>';
	 $total_salidas  = $total_salidas + $mov['cantidad'];
	 
	}// fin de while 
}// fin de if filas_movimientos 
echo '<table>';

////////////////////////////ENTRADAS
$total_entradas = 0;
$sql_adiciones_inventario = "select * from $tabla19   where id_codigo_producto = '".$_REQUEST['id_codigo']."'  
and   id_empresa = '".$_SESSION['id_empresa']."'    ";
$con_entradas = mysql_query($sql_adiciones_inventario,$conexion);
$filas_entradas = mysql_num_rows($con_entradas);

echo '<br><br>';
echo 'ENTRADAS INVENTARIO';
echo '<table border = "1"  width="95%" >';
echo '<tr>';
echo '<td>CODIGO</td>';
echo '<td>PROVEEDOR</td>';
echo '<td>FECHA</td>';
echo '<td align="right">CANTIDAD</td>';
echo '</tr>';
if ($filas_entradas  > 0 )
{ 
 while($mov = mysql_fetch_assoc($con_entradas))
 	{
	   $datos_cxp = consulta_assoc($cuentasxpagar,'factura_compra',$mov['facturacompra'],$conexion) ;  
	   $datos_proveedor = consulta_assoc($proveedores,'idcliente',$datos_cxp['id_proveedor'],$conexion) ;  
	//echo $descripcion;
	 echo '<tr>';
	 echo '<td>'.$datos_codigo['codigo_producto'].'</td>';
	  echo '<td>'.$datos_proveedor['nombre'].'</td>';
	  echo '<td>'.$mov ['fecha_movimiento'].'</td>';
	 echo '<td align="right">'.$mov['cantidad'].'</td>';
	 echo '</tr>';
	 $total_entradas  = $total_entradas +  $mov['cantidad'];
	 
	 
	}// fin de while 
}// fin de if filas_movimientos 
echo '<table>';



echo '<br><br>';
echo 'RESUMEN';
echo '<br>CANTIDAD INICIAL  = '.$datos_codigo['cantidad_inicial'];
echo '<br>ENTRADAS = '.$total_entradas;
echo '<br>SALIDAS='.$total_salidas;
$resultado = $datos_codigo['cantidad_inicial'] + $total_entradas  - $total_salidas;
echo '<br>DEBE HABER ='.$resultado;

/////////////////////////////////
 function  consulta_assoc($tabla,$campo,$parametro,$conexion)
  {
       $sql="select * from $tabla  where ".$campo." = '".$parametro."' ";
       //echo '<br>'.$sql;
       $con = mysql_query($sql,$conexion);
       $arr_con = mysql_fetch_assoc($con);
       return $arr_con;
  }
?>	
	
	
</body>
</html>
<script src="../js/modernizr.js"></script>   
<script src="../js/prefixfree.min.js"></script>
<script src="../js/jquery-2.1.1.js"></script>   
