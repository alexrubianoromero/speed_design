<?php
session_start();
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
<? include("../empresa.php"); 
include("../valotablapc.php"); 

$sql_pefiles = "select * from $tabla30 where id_empresa = '".$_SESSION['id_empresa']."' order by id_perfil";
$consulta_perfiles = mysql_query($sql_pefiles,$conexion);
//echo '<br>'.$sql_pefiles;
?>
<br>
<br>	
<h3>INGRESO</h3>
<div id = "datos">
<table width="50%" border="1">
  <tr>
    <td>NOMBRE PERFIL </td>
    <td><input type="text" name="nombre_perfil"  id = "nombre_perfil"></td>
  </tr>
  <tr>
    <td>DESCRIPCION</td>
    <td><input type="descripcion" name=""  id = "descripcion"></td>
  </tr>

  <tr>
    <td><button type ="button"  id = "grabar_tecnico" ><h4>GRABAR</h4></button></td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
</body>
</html>
<script src="../js/modernizr.js"></script>   
<script src="../js/prefixfree.min.js"></script>
<script src="../js/jquery-2.1.1.js"></script>   

<script language="JavaScript" type="text/JavaScript">
            
			$(document).ready(function(){
               
					
					/////////////////////////
					$("#grabar_tecnico").click(function(){
							var data =  'nombre_perfil=' + $("#nombre_perfil").val();
							data += '&descripcion=' + $("#descripcion").val();
						
							$.post('grabar_persona.php',data,function(a){
							//$(window).attr('location', '../index.php);
							$("#datos").html(a);
								//alert(data);
							});	
						 });
					////////////////////////
					
			
			});		////finde la funcion principal de script
			
			
			
			
			
</script>

  
