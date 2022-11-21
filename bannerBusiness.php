<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="disenoBusiness.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!-- Minified JS library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <style>
        body{
            background-color: black;
        }
    </style>
    <?php 
        session_start();
        include("conexion.php");
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";

        $query = mysqli_query($conexion,$sql);
        $fetch = mysqli_fetch_array($query);
    ?>
    <div class="bannerBusiness">
        <a href="business.php">
            <img src="imagenes/business.png" class="logoBusiness">
        </a>
        <div class="menu">
            <table border="0">
                <td>
                    <img src="data:image/jpg;base64,<?php echo base64_encode($fetch['foto']); ?>" class="imageBusiness">
                </td>
                <td>&nbsp;</td>
                <td>
                    <h4><?php echo $fetch['nombre_usuario'] ?></h4>
                </td>
                <td>&nbsp;</td>
                <td>
                    <div class="dropdown menus2">
                        <button type="button" class="button" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="editar.php"> Editar perfil </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="crearEvento.php"> Crear evento </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="index.php"> Cerrar sesión</a>
                            </li>
                        </div>
                    </div>
                </td>
            </table>
        </div>  
    </div>
</head>
</html>