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
  

  </ul>

</div>


</div>


<div id="content">
<h2 class="style5"> Olas Montadas</h2>
<form action="" method="POST">


Nombre del participante:</br>
<input type="text" name="nombre" required="required"/></br></br>

Fecha de participacion:</br>
<input type="date" name="fecha" required="required"/></br></br>

Duracion de la ola montada(en segundos):</br>
Menos de 20s <input type="radio" name="duracion" required="required" value="menos20"/></br>
Entre 20s y 40s <input type="radio" name="duracion" required="required" value="20y40"/></br>
Entre 41s y 100s <input type="radio" name="duracion" required="required" value="41y100"/></br>
Mas de 100s <input type="radio" name="duracion" required="required" value="mas100"/></br>
 </br></br>
 
Juez:</br>
J1<input type="radio" name="juez" required="required" value="J1"/></br>
J2<input type="radio" name="juez" required="required" value="J2"/></br>
J3<input type="radio" name="juez" required="required" value="J3"/></br>
J4<input type="radio" name="juez" required="required" value="J4"/></br>
 </br></br>

Tipo de olas:</br>
Mala<input type="radio" name="tipo" required="required" value="Mala"/></br>
Mediocre<input type="radio" name="tipo" required="required" value="Mediocre"/></br>
Buena<input type="radio" name="tipo" required="required" value="Buena"/></br>
Muy buena<input type="radio" name="tipo" required="required" value="MuyBuena"/></br>
Excelente<input type="radio" name="tipo" required="required" value="Excelente"/></br>
 </br></br>

Fecha Registro:</br>
<input type="text" name="registro" required="required" readonly value="<?php echo date('d/m/Y'); ?>" ></br></br>

Codigo:</br>
<input type="text" name="codigo" required="required"  readonly value="<?php
$logitud = 4;
$psswd = substr((microtime()), 4, $logitud);
echo $psswd;
?>" ></br></br>
	
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
				$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
				$query = "INSERT INTO ola VALUES ('".$_REQUEST['nombre']."',
				'".$_REQUEST['fecha']."',
				'".$_REQUEST['duracion']."',
				'".$_REQUEST['juez']."',
				'".$_REQUEST['tipo']."',
				'".$_REQUEST['registro']."',
				'$puntosDuracion',
				'".$_REQUEST['codigo']."'
				)";
				mysqli_query($link, $query);
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Se agrego correctamente");';
				echo '</script>';
				
			
			}
?>