<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>


  
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


  


  


  
  <title>Company Name</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
<!--
.style8 {color: #2B4F77}
-->
  </style>
</head>


<body>


<div id="contain">
<div id="header">
<h1 class="style1 style7 style5 style5 style8">Reyes de las olas: Surf Up!!!!!!!!</h1>
<form method="POST" name="formulario" action="">

</div>

<div id="content">
<h2 class="style5"> Iniciar sesion</h2>
<!-- aqui se trabaja -->
Usuario:</br>
<input type="text" name="usuario" required="required"/></br></br>
Clave:</br>
<input type="password" name="clave" required="required"/>

<td><div align="center"></div></td>
        <td><input type="submit" name="aceptar" value="Aceptar" />      
	    <input type="reset" name="cancelar" value="Cancelar" /></td> 
<!-- aqui se trabaja -->
<p>&nbsp;</p>
	   

<p>&nbsp;</p>


</div>

</form>
<div id="footer">

<p class="style5 style6">
Copyright © 2005 | All Rights Reserved  </p>


</div>


</div>


</body>
</html>

<?php
	if(!empty($_REQUEST['aceptar'])){
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		$query = "SELECT * FROM usuarios where usuario = '".$_POST['usuario']."' and clave = '".$_POST['clave']."'";
		if($result = mysqli_query($link, $query)){
			mysqli_data_seek ($result, 0);
			$extraido= mysqli_fetch_array($result);
			if($extraido['usuario'] && $extraido['clave']){
				session_start();
				$_SESSION['usuario']= $extraido['nombre'];
				mysqli_free_result($result);
				mysqli_close($link);
				header ('Location: principal.php');	
			
			$fp = fopen("bitacora.txt", "a+");  
			fwrite($fp, "Usuario: ". $_POST['usuario'] .PHP_EOL); 
			fwrite($fp,"Fecha: " .date('d/m/Y'). PHP_EOL);
			fclose($fp);
			
			}
			else{
				mysqli_free_result($result);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Datos incorrectos");';
				echo 'window.location.href=("login.php")';
				echo '</script>';
			}
		}
		
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		$tildes = $link->query("SET NAMES 'utf8'");
		$query = "SELECT nombre FROM usuarios where usuario = '".$_POST['usuario']."'";
		if($result = mysqli_query($link, $query)){
			mysqli_data_seek ($result, 0);
			$extraido= mysqli_fetch_array($result);
			setcookie("nombre_completo",$extraido['nombre'],time()+60*60*24*365,"/"); 
			mysqli_free_result($result);
			mysqli_close($link);
		}
	}			
		
 ?>