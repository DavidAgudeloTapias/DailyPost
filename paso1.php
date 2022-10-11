<?php
	include("conexion.php");
	session_start();
	$id=$_SESSION['id'];
	$musica=$_POST['musica'];
	$comida=$_POST['comida'];
	$salidas=$_POST['salidas'];


	if(isset($_POST['enviar']))
	{
		foreach ($_POST['musica'] as $gusto) 
		{
			$sql="INSERT INTO gustos(id_gusto,id_usuario,gustos) VALUES (NULL,'$id','$gusto')";
			$ej=mysqli_query($conexion,$sql);
		}
	
		foreach ($_POST['comida'] as $gusto2) 
		{
			$sql="INSERT INTO gustos(id_gusto,id_usuario,gustos) VALUES (NULL,'$id','$gusto2')";
			$ej=mysqli_query($conexion,$sql);
		}

		foreach ($_POST['salidas'] as $gusto3) 
		{
			$sql="INSERT INTO gustos(id_gusto,id_usuario,gustos) VALUES (NULL,'$id','$gusto3')";
			$ej=mysqli_query($conexion,$sql);
		}

		$sql4="UPDATE usuarios SET clase=0 WHERE id_usuario='$id'";
		$ej4=mysqli_query($conexion,$sql4);

	}
	header("Location:index.php");
?>