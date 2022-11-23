<?php 
	include("conexion.php");

	$nombreEvento = $_POST['nombreEvento'];
	$descripcion = $_POST['descripcion'];
    session_start();
	$id_usuario = $_SESSION['id'];
	$foto_evento = addslashes(file_get_contents($_FILES['foto_evento']['tmp_name']));

	$musica = $_POST['musica'];
	$comida = $_POST['comida'];
	$salidas = $_POST['salidas'];

    $sql = "INSERT INTO eventos(id_evento,nombre_evento,descripcion,foto_evento,id_usuario) VALUES (NULL,'$nombreEvento','$descripcion','$foto_evento','$id_usuario')";
    $query = mysqli_query($conexion,$sql);

    $sql = "SELECT * FROM eventos WHERE id_usuario = '$id_usuario' ORDER BY id_evento DESC;";
    $query = mysqli_query($conexion,$sql);
    $fetch = mysqli_fetch_array($query);
    $id_evento = $fetch['id_evento'];

	foreach ($_POST['musica'] as $gusto) 
	{
		$sql = "INSERT INTO categoria(id_categoria,id_evento,categoria,id_cre) VALUES (NULL,'$id_evento','$gusto','$id_usuario')";
		$ej = mysqli_query($conexion,$sql);
	}
	
	foreach ($_POST['comida'] as $gusto2) 
	{
		$sql = "INSERT INTO categoria(id_categoria,id_evento,categoria,id_cre) VALUES (NULL,'$id_evento','$gusto2','$id_usuario')";
		$ej = mysqli_query($conexion,$sql);
	}

	foreach ($_POST['salidas'] as $gusto3) 
	{
		$sql = "INSERT INTO categoria(id_categoria,id_evento,categoria,id_cre) VALUES (NULL,'$id_evento','$gusto3','$id_usuario')";
		$ej = mysqli_query($conexion,$sql);
	}
	header("location:map.php?id_evento=$id_evento");
?>