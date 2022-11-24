<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" href="disenoEventos.css">
        <title>Document</title>
    </head>
    <body>
        <?php
            include("conexion.php");
            $sql = "SELECT * FROM categoria JOIN gustos on gustos.gustos = categoria.categoria JOIN 
                eventos on categoria.id_evento = eventos.id_evento GROUP BY eventos.id_evento";
            $query = mysqli_query($conexion,$sql);
        ?>
        <div class="eventos">
        <?php
        while($fetch = mysqli_fetch_array($query))
        {
            $id_evento = $fetch['id_evento'];

        $sql2 = "SELECT * FROM eventos WHERE id_evento = '$id_evento'";
            $query2 = mysqli_query($conexion,$sql2);
            $fetch2 = mysqli_fetch_array($query2);

            $id_creador = $fetch2['id_usuario'];

            $sql3 = "SELECT * FROM usuarios JOIN eventos on usuarios.id_usuario = eventos.id_usuario and usuarios.id_usuario = '$id_creador'";
            $query3 = mysqli_query($conexion,$sql3);
            $fetch3 = mysqli_fetch_array($query3);
        ?>
            <div class="card">
                <div class="image">
                    <img src="data:image/jpg;base64,<?php echo base64_encode($fetch['foto_evento']); ?>">
                </div>
                <div class="caption">
                    <p class="eventName"> <b> Nombre del evento: </b> <?php echo $fetch['nombre_evento'] ?> </p>
                    <p class="description"> <b> Descripción del evento: </b> <?php echo $fetch['descripcion'] ?> </p>
                    <p class="namePlace"> <b> Nombre del establecimiento: </b> <?php echo $fetch3['nombre_usuario'] ?> </p>
                    <p class="direction"> <b> Dirección del establecimiento: </b> <?php echo $fetch['direccion'] ?> </p>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <div class="banner2">
            <img src="logo.png" class="logo">
            <a href="index.php"><button class="boton5">Volver al Inicio</button></a>
        </div>
    </body>
</html>