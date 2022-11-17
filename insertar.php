<?php 
	include("conexion.php");
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];

	$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));

	if(isset($_POST['enviar1']))
	{
		$sql="INSERT INTO usuarios(id_usuario,nombre_usuario,correo,usuario,clave,foto,clase) VALUES (NULL,'$nombre','$correo','$usuario','$clave','$foto',1)";
	}

	if(isset($_POST['enviar2']))
	{
    	$sql="INSERT INTO usuarios(id_usuario,nombre_usuario,correo,usuario,clave,foto,clase) VALUES (NULL,'$nombre','$correo','$usuario','$clave','$foto',2)";
    }

    $query=mysqli_query($conexion,$sql);
    
header("location:index.php #registro");
?>