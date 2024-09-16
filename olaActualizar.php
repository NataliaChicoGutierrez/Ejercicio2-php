<?php
	$link = mysqli_connect("localhost", "root", "");
	mysqli_select_db($link, "SurfUp");
	$result = mysqli_query($link, "SELECT * FROM ola WHERE codigo = '".$_REQUEST['codigo']."'");
	while ($fila = mysqli_fetch_array($result)) {
		$participante = $fila['participante'];
		$fecha = $fila['fecha'];
		$duracion = $fila['duracion'];
		$juez = $fila['juez'];
		$tipo = $fila['tipo'];
		$registro = $fila['registro'];
		$puntos = $fila['puntos'];
		$codigo = $fila['codigo'];
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
  <li><a href="olaMostrar.php">Volver a la tabla de las olas </a></li>

  </ul>



</div>


</div>


<div id="content">
<h2 class="style5"> Ingrese los siguientes datos</h2>
<form action="" method="POST">

Nombre del participante:</br>
<input type="text" name="nombre" required="required" readonly value="<?php echo "$participante" ?>"></br></br>

Fecha de participacion:</br>
<input type="date" name="fecha" required="required" readonly value="<?php echo "$fecha" ?>"></br></br>

Duracion de la ola montada(en segundos):</br>
Menos de 20s <input type="radio" name="duracion" required="required" value="menos20" <?php echo ($duracion =='menos20')?'checked':'' ?>></br>
Entre 20s y 40s <input type="radio" name="duracion" required="required" value="20y40" <?php echo ($duracion =='20y40')?'checked':'' ?>></br>
Entre 41s y 100s <input type="radio" name="duracion" required="required" value="41y100" <?php echo ($duracion =='41y100')?'checked':'' ?>></br>
Mas de 100s <input type="radio" name="duracion" required="required" value="mas100" <?php echo ($duracion =='mas100')?'checked':'' ?>></br>
 </br></br>
 
Juez:</br>
J1<input type="radio" name="juez" required="required" value="J1" <?php echo ($juez =='J1')?'checked':'' ?>></br>
J2<input type="radio" name="juez" required="required" value="J2" <?php echo ($juez =='J2')?'checked':'' ?>></br>
J3<input type="radio" name="juez" required="required" value="J3" <?php echo ($juez =='J3')?'checked':'' ?>></br>
J4<input type="radio" name="juez" required="required" value="J4" <?php echo ($juez =='J4')?'checked':'' ?>></br>
 </br></br>

Tipo de olas:</br>
Mala<input type="radio" name="tipo" required="required" value="Mala" <?php echo ($tipo =='Mala')?'checked':'' ?>></br>
Mediocre<input type="radio" name="tipo" required="required" value="Mediocre" <?php echo ($tipo =='Mediocre')?'checked':'' ?>></br>
Buena<input type="radio" name="tipo" required="required" value="Buena" <?php echo ($tipo =='Buena')?'checked':'' ?>></br>
Muy buena<input type="radio" name="tipo" required="required" value="MuyBuena" <?php echo ($tipo =='MuyBuena')?'checked':'' ?>></br>
Excelente<input type="radio" name="tipo" required="required" value="Excelente" <?php echo ($tipo =='Excelente')?'checked':'' ?>></br>
 </br></br>

Fecha Registro:</br>
<input type="text" name="registro" required="required" readonly value="<?php echo "$registro" ?>"></br></br>

Codigo:</br>
<input type="text" name="codigo" required="required"  readonly value="<?php echo "$_REQUEST[codigo]" ?>" ></br></br>
	

<input type="submit" name="aceptar" value="Actualizar" /> 
<input type="submit" name="eliminar" value="Eliminar" /> 
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
$puntosTipo;
if(isset($_POST['tipo'])){
	if($_POST['tipo'] == "Mala"){
					$puntosTipo = 20;
				} else if($_POST['tipo'] == "Mediocre"){
					$puntosTipo = 40;
				} else if($_POST['tipo'] == "Buena"){
					$puntosTipo = 60;
				}else if($_POST['tipo'] == "MuyBuena"){
					$puntosTipo = 80;
				}else if($_POST['tipo'] == "Excelente"){
					$puntosTipo = 100;
				}
}

$puntosDuracion;
if(isset($_POST['duracion'])){
	if($_POST['duracion'] == "20y40"){
					$puntosDuracion = $puntosTipo + 10;
				} else if($_POST['duracion'] == "41y100"){
					$puntosDuracion = $puntosTipo + 20;
				} else if($_POST['duracion'] == "mas100"){
					$puntosDuracion = $puntosTipo + 30;
				}
}


if(!empty($_REQUEST['aceptar'])){
			
				$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); 
				$query = "UPDATE ola SET participante = '".$_REQUEST['nombre']."',
				fecha = '".$_REQUEST['fecha']."',
				duracion = '".$_REQUEST['duracion']."',
				juez = '".$_REQUEST['juez']."',
				tipo = '".$_REQUEST['tipo']."',
				registro = '".$_REQUEST['registro']."',
				puntos = '$puntosDuracion'
				WHERE codigo = '".$_REQUEST['codigo']."'";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert(" Actualizado");';
				echo '</script>';
				
			
			}
			
if(!empty($_REQUEST['eliminar'])){
	$link = mysqli_connect("localhost", "root", "");
				mysqli_select_db($link, "SurfUp");
				$tildes = $link->query("SET NAMES 'utf8'"); 
				$query = "DELETE FROM ola WHERE codigo = '".$_REQUEST['codigo']."'";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert(" Eliminado");';
				echo '</script>';
}
?>