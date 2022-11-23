<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/member.JPG">
    <link rel="stylesheet" href="disenoMember.css">
    <title>Información del Evento</title>
</head>
<body>
    <?php
        include("conexion.php");
        include("bannerMember.php");
    ?>
    <!------ Eventos buscado ------->
    <?php
        $id_evento = $_GET['id_evento'];
        $sql = "SELECT * FROM eventos WHERE id_evento = '$id_evento'";
        $query = mysqli_query($conexion,$sql);
        $numrows = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);

        if($numrows != 0)
        {
            $id_creador = $fetch['id_usuario'];

            $sql2 = "SELECT * FROM usuarios WHERE id_usuario = '$id_creador'";
            $query2 = mysqli_query($conexion,$sql);
    ?>
            <div class="eventos">
                <?php
                    while($fetch2 = mysqli_fetch_array($query2))
                    {
                ?>
                        <div class="card">
                            <div class="image">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($fetch2['foto_evento']); ?>">
                            </div>
                            <div class="caption">
                                <p class="eventName"> <b> Nombre del evento:  </b> <?php echo $fetch2['nombre_evento'] ?> </p>
                                <p class="description"> <b> Descripción del evento: </b> <?php echo $fetch2['descripcion'] ?> </p>
                                <p class="namePlace"> <b> Nombre del establecimiento: </b> <?php echo $fetch2['nombre_usuario'] ?> </p>
                                <p class="direction"> <b> Dirección del establecimiento: </b> <?php echo $fetch2['direccion'] ?> </p>
                            </div>
                            <form action="member.php">
                                <center> <button class="knowmore"> Volver al inicio </button> </center>
                            </form>
                        </div>
                <?php
                    }
                ?>
            </div>
    <?php
        }
    ?>
</body>
</html>