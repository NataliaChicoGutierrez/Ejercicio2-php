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
<form action="" method="get">
Seleccione el codigo del usuario que desea actualizar o eliminar.



<table border="3">
<tr> <th> Participante <th> Fecha </th> <th> Duracion </th> <th> Juez </th> <th> Tipo Ola </th> <th> Registro </th> <th> Puntos </th> <th> Codigo </th></tr>

				 <?php
					$link = mysqli_connect("localhost", "root", "");
					mysqli_select_db($link, "SurfUp");
					$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
					if($result = mysqli_query($link, "SELECT * FROM `ola`")){					
						for ($i=0; $i < $result->num_rows ; $i++ )
						{
							echo "<tr>";
							mysqli_data_seek ($result, $i);
							$extraido= mysqli_fetch_array($result);
						
							echo "<td>".$extraido['participante']."</td>";
							echo "<td>".$extraido['fecha']."</td>";
							echo "<td>".$extraido['duracion']."</td>";
							echo "<td>".$extraido['juez']."</td>";
							echo "<td>".$extraido['tipo']."</td>";
							echo "<td>".$extraido['registro']."</td>";
							echo "<td>".$extraido['puntos']."</td>";
							echo "<td> <a href='olaActualizar.php?codigo=$extraido[codigo]'>".$extraido['codigo']."</a></td>";
							echo "</tr>";
							
						}
							mysqli_free_result($result);  //libera el $result
							mysqli_close($link);						
					}
			 ?>
</table>

</div>
</form> 

<div id="footer">

<p class="style5 style6">
Copyright © 2005 | All Rights Reserved  </p>


</div>


</div>


</body>
</html>
