<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/business.JPG">
    <link rel="stylesheet" href="diseno.css">
    <title>Member</title>
    <style>
        body{
            background-color: white;
        }
        h4{
            color: black;
        }
    </style>
</head>
<body>
    
    <?php
        include("conexion.php");
        session_start();
        $id = $_SESSION['id'];

        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
        $query = mysqli_query($conexion,$sql);
        $numrows = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);
        if($numrows != 0)
        {
    ?>
            <center>
    <?php
                $sql = "SELECT * FROM eventos JOIN categoria JOIN gustos JOIN usuarios WHERE eventos.id_evento = categoria.id_evento AND 
                categoria.categoria = gustos.gustos AND gustos.id_usuario = usuarios.id_usuario AND usuarios.id_usuario = '$id'";
                $query = mysqli_query($conexion,$sql);
                while($fetch = mysqli_fetch_array($query))
                {
                    ?>
                        <h4><?php echo $fetch['id_evento'] ?></h4>
                        <h4><?php echo $fetch['nombre_evento'] ?></h4>
                        <h4><?php echo $fetch['descripcion'] ?></h4>
                    <?php 
                }
    ?>
            </center> 
    <?php
        }
        else
        {
            header("location:index.php");
        }
    ?>
</body>
</html>