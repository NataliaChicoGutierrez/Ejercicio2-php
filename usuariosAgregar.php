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
<h1 class="style1 style7 style5 style5 style8">Reyes de las olas</h1>


</div>


<div id="leftcol">
<h3 class="style5">Menu</h3>
<?php if (isset($_COOKIE['nombre_completo'])) echo $_COOKIE['nombre_completo'];?>

<div id="navcontainer">
<ul id="navlist">


  <li><a href="principal.php">Volver</a></li>
  <li><a href="usuariosMostrar.php">Ver usuarios</a></li>

  </ul>



</div>


</div>


<div id="content">
<h2 class="style5"> Ingrese un usuario</h2>
<form action="" method="POST">


Usuario:</br>
<input type="text" name="usuario" required="required"/></br></br>

Clave:</br>
<input type="password" name="clave" required="required"/></br></br>

Confirme la clave:</br>
<input type="password" name="claveConf" required="required"/></br></br>

Nombre:</br>
<input type="text" name="nombre" required="required"/></br></br>

Cedula:</br>
<input type="text" name="cedula" required="required"/></br></br>

Puesto:</br>
Administrador<input type="radio" name="puesto" required="required" value="Administrador"/></br>
Coordinador<input type="radio" name="puesto" required="required" value="Coordinador"/></br>
Consultor<input type="radio" name="puesto" required="required" value="Consultor"/></br>
 </br></br>

 
Estado:</br>
Activo<input type="radio" name="estado" required="required" value="Activo"/></br>
Inactivo<input type="radio" name="estado" required="required" value="Inactivo"/></br>
</br></br>

Tiempo de antiguedad:</br>
<input type="number" name="antiguedad" required="required"/></br></br>


<input type="submit" name="aceptar" value="Aceptar" /> 
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
$salario;
if(isset($_POST['puesto']) && isset($_POST['antiguedad'])){
	if($_POST['puesto'] == "Administrador"){
					$salario = 0.1 * $_POST['antiguedad'];
					$salarioTotal = $salario + 3500;
				} else if($_POST['puesto'] == "Coordinador"){
					$salario = 0.07 * $_POST['antiguedad'];
					$salarioTotal = $salario + 2000;
					
				} else if($_POST['puesto'] == "Consultor"){
					$salario = 0.05 * $_POST['antiguedad'];
					$salarioTotal = $salario + 750;
				}
}

if(!empty($_REQUEST['aceptar'])){
			if($_REQUEST['clave']== $_REQUEST['claveConf']){
				echo "Sus claves si coinciden ";
				
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
				$query = "INSERT INTO usuarios VALUES ('".$_REQUEST['usuario']."',
				'".$_REQUEST['clave']."',
				'".$_REQUEST['nombre']."',
				'".$_REQUEST['cedula']."',
				'".$_REQUEST['puesto']."',
				'".$_REQUEST['estado']."',
				'".$_REQUEST['antiguedad']."',
				'$salarioTotal'
				)";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Usuario ingresado");';
				echo '</script>';
				
			}else{
				echo "Sus claves no coinciden ";
			}
			}
?>