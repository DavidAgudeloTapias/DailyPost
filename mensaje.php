
<?php
	include("conexion.php");
	$nombre=$_POST['nombre'];
	$asunto=$_POST['asunto'];
	$mensaje=$_POST['mensaje'];

	$sql="INSERT INTO mensajes(id_mensaje,nombre_usuario,asunto,mensaje) VALUES (NULL,'$nombre','$asunto','$mensaje')";
	$query=mysqli_query($conexion,$sql);

header("location:index.php #contactenos");
?>