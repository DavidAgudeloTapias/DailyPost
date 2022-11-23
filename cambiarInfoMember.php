<?php 
    session_start();
    include("conexion.php");

    $nombre=$_POST['nombre'];
    $id=$_SESSION['id'];
    $usuario=$_POST['usuario'];
    echo $_FILES['foto']['tmp_name'];
    $clave=$_POST['clave'];

    if(!empty($_FILES['foto']['name']))
    {
        $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $sql = "UPDATE usuarios SET nombre_usuario='$nombre',usuario='$usuario',clave='$clave',foto='$foto' WHERE id_usuario='$id'";
    }
    else
    {
        $sql="UPDATE usuarios SET nombre_usuario='$nombre',usuario='$usuario',clave='$clave' WHERE id_usuario='$id'";
    }
    $query=mysqli_query($conexion,$sql);
    header("location:member.php");
?>