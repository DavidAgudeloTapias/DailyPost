<?php
    include("conexion.php");
    $id_evento = $_GET['id_evento'];
    $longitud = $_GET['longitude'];
    $latitud = $_GET['latitude'];
    $direccion = $_GET['direccion'];

    $sql = "UPDATE eventos SET longitud = '$longitud',latitud = '$latitud',direccion='$direccion' WHERE id_evento = '$id_evento'";
    $query = mysqli_query($conexion,$sql);

    header("location:business.php");
?>