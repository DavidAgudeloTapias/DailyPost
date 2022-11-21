<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/business.JPG">
    <link rel="stylesheet" href="disenoMember.css">
    <title>Business</title>
</head>
<body>
    <?php
        include("bannerBusiness.php");

        $id = $_SESSION['id'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
        $query = mysqli_query($conexion,$sql);
        $numrows = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);

        if($numrows != 0)
        {
            $sql = "SELECT * FROM eventos JOIN usuarios WHERE usuarios.id_usuario = eventos.id_usuario AND eventos.id_usuario = '$id'";
            $query = mysqli_query($conexion,$sql);
    ?>
            <div class="eventos">
                <?php
                    while($fetch = mysqli_fetch_array($query))
                    {
                ?>
                        <div class="card">
                            <div class="image">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($fetch['foto_evento']); ?>">
                            </div>
                            <div class="caption">
                                <p class="eventName"> <b> Nombre del evento:  </b> <?php echo $fetch['nombre_evento'] ?> </p>
                                <p class="description"> <b> Descripción del evento: </b> <?php echo $fetch['descripcion'] ?> </p>
                                <p class="namePlace"> <b> Nombre del establecimiento: </b> <?php echo $fetch['nombre_usuario'] ?> </p>
                            </div>
                            <center> <button class="knowmore"> Editar Evento </button> </center>
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