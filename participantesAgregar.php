<?php
date_default_timezone_set('America/Costa_Rica');
?>
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
	<li><a href="participanteMostrar.php">Ver participantes</a></li>
  </ul>



</div>


</div>


<div id="content">
<h2 class="style5"> Ingresar Participantes</h2>
<form action="" method="POST">

Nombre:</br>
<input type="text" name="nombre" required="required"/></br></br>

Cedula:</br>
<input type="text" name="cedula" required="required"/></br></br>

Genero:</br>
Femenino<input type="radio" name="genero" required="required" value="femenino"/></br>
Masculino<input type="radio" name="genero" required="required" value="masculino"/></br>

Edad:</br>
<input type="text" name="edad" required="required"/></br></br>

Fecha Nacimiento:</br>
<input type="date" name="nacimiento" required="required"/></br></br>

Lugar domicilio:</br>
<input type="text" name="lugar" required="required"/></br></br>

Fecha Registro:</br>
<input type="text" name="registro" required="required" readonly value="<?php echo date('d/m/Y'); ?>" ></br></br>

Tipo de jugador:</br>
Novato<input type="radio" name="jugador" required="required" value="novato"/></br>
Intermedio<input type="radio" name="jugador" required="required" value="intermedio"/></br>
Experimentado<input type="radio" name="jugador" required="required" value="experimentado"/></br>


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


if(!empty($_REQUEST['aceptar'])){
			
				
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
				$query = "INSERT INTO participante VALUES ('".$_REQUEST['nombre']."',
				'".$_REQUEST['cedula']."',
				'".$_REQUEST['genero']."',
				'".$_REQUEST['edad']."',
				'".$_REQUEST['nacimiento']."',
				'".$_REQUEST['lugar']."',
				'".$_REQUEST['registro']."',
				'".$_REQUEST['jugador']."'
				)";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Participante ingresado");';
				echo '</script>';
				
			
			}
?>