<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "SurfUp");
	$result = mysqli_query($link, "SELECT * FROM participante WHERE cedula = '".$_REQUEST['cedula']."'");
	while ($fila = mysqli_fetch_array($result)) {
		$nombre = $fila['nombre'];
		$cedula = $fila['cedula'];
		$genero = $fila['genero'];
		$edad = $fila['edad'];
		$fechaNac = $fila['fechaNac'];
		$lugarDom = $fila['lugarDom'];
		$fechaRegistro = $fila['fechaRegistro'];
		$tipoJugador = $fila['tipoJugador'];
		} 
	mysqli_free_result($result);
	mysqli_close($link);
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


 
  <li><a href="principal.php">Volver a la pagina principal </a></li>
  <li><a href="participanteMostrar.php">Volver a la tabla de participantes </a></li>

  </ul>



</div>


</div>


<div id="content">
<h2 class="style5">Ingrese un participante
</h2>
<form action="" method="POST">

Nombre:</br>
<input type="text" name="nombre" required="required" value="<?php echo "$nombre" ?>"></br></br>

Cedula:</br>
<input type="text" name="cedula" required="required" value="<?php echo "$cedula" ?>" readonly></br></br>

Genero:</br>
Femenino<input type="radio" name="genero" required="required" value="femenino" <?php echo ($genero =='femenino')?'checked':'' ?>></br>
Masculino<input type="radio" name="genero" required="required" value="masculino" <?php echo ($genero =='masculino')?'checked':'' ?>></br>

Edad:</br>
<input type="text" name="edad" required="required" value="<?php echo "$edad" ?>"></br></br>

Fecha Nacimiento:</br>
<input type="date" name="nacimiento" required="required" value="<?php echo "$fechaNac" ?>"></br></br>

Lugar domicilio:</br>
<input type="text" name="lugar" required="required" value="<?php echo "$lugarDom" ?>"></br></br>

Fecha Registro:</br>
<input type="text" name="registro" required="required" readonly value="<?php echo "$fechaRegistro" ?>" ></br></br>

Tipo de jugador:</br>
Novato<input type="radio" name="jugador" required="required" value="novato" <?php echo ($tipoJugador =='novato')?'checked':'' ?>></br>
Intermedio<input type="radio" name="jugador" required="required" value="intermedio" <?php echo ($tipoJugador =='intermedio')?'checked':'' ?>></br>
Experimentado<input type="radio" name="jugador" required="required" value="experimentado" <?php echo ($tipoJugador =='experimentado')?'checked':'' ?>></br>


<input type="submit" name="actualizar" value="Actualizar" /> 
<input type="submit" name="eliminar" value="Eliminar" /> 
</div>
</form> 

<div id="footer">

<p class="style5 style6">
Copyright © 2022 | All Rights Reserved  </p>


</div>


</div>


</body>
</html>
<?php


if(!empty($_REQUEST['actualizar'])){
			
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); 
				$query = "UPDATE participante SET nombre = '".$_REQUEST['nombre']."',
				genero = '".$_REQUEST['genero']."',
				edad = '".$_REQUEST['edad']."',
				fechaNac = '".$_REQUEST['nacimiento']."',
				lugarDom = '".$_REQUEST['lugar']."',
				fechaRegistro = '".$_REQUEST['registro']."',
				tipoJugador = '".$_REQUEST['jugador']."',
				WHERE cedula = '".$_REQUEST['cedula']."';";
				mysqli_query($link, $query);
				if(mysqli_query($link, $query)){
					echo '<script language="javascript">';
					echo 'alert(" Actualizado");';
					echo '</script>';
					mysqli_close($link);
				}
				else{
					echo '<script language="javascript">';
					echo 'alert(" No se pudo actualizar");';
					echo '</script>';
					mysqli_close($link);
				}
				
			}
			
if(!empty($_REQUEST['eliminar'])){
	$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
				$query = "DELETE FROM participante WHERE cedula = '".$_REQUEST['cedula']."'";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Participante eliminado");';
				echo '</script>';
}
?>