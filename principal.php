
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
<h1 class="style1 style7 style5 style5 style8">Principal</h1>


</div>


<div id="leftcol">
<h3 class="style5">Menu </h3>
<?php if (isset($_COOKIE['nombre_completo'])) echo $_COOKIE['nombre_completo'];?>

<div id="navcontainer">
<ul id="navlist">


  <li><a href="login.php">Inicio</a></li>
  <li><a href="participanteMostrar.php">Ver participantes</a></li>
  <li><a href="participantesAgregar.php">Agregar participantes</a></li>
  <li><a href="olasAgregar.php">Agregar Olas montadas</a></li>
  <li><a href="olaMostrar.php">Ver Olas montadas</a></li>
  <li><a href="usuariosMostrar.php">Ver usuarios</a></li>
  <li><a href="usuariosAgregar.php">Agregar usuarios</a></li>
  <!--<li><input name="auditoria" type="submit" value="Auditoria"></li>-->
  <li><a href="bitacora.txt">Auditoria</a></li>
  <li><a href="acercaDe.php">Acerca de</a></li>
  <form action="login.php" method="POST">
  <input type="submit" name="salir" value="Salir" /> 
  </form> 
  </ul>

</div>

</div>

<div id="content">
<h2 class="style5"> Reyes de las olas</h2>
<h2 class="style5"> Campeonato Nacional de Surf </h2>
    <p>Bienvenido al sistema de control de evaluación</p>
<?php


if(!empty($_REQUEST['auditoria'])){
	$texto = file_get_contents("bitacora.txt"); 
			$texto = nl2br($texto); 
			echo $texto;
}
if(!empty($_REQUEST['salir'])){
$fp = fopen("bitacora.txt", "a+");  
			fwrite($fp, "Usuario: ". $_POST['usuario'] .PHP_EOL); 
			fwrite($fp,"Fecha final sesion: " .date('d/m/Y'). PHP_EOL);
			fclose($fp);
			session_destroy();
}			
?>
   
<p>&nbsp;</p>


<p>&nbsp;</p>


</div>


<div id="footer">

<p class="style5 style6">
Copyright © 2005 | All Rights Reserved  </p>


</div>


</div>


</body>
</html>
