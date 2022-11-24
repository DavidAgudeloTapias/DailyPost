<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/member.JPG">
    <link rel="stylesheet" href="disenoMember.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Member</title>
</head>
<body>
    <?php
        include("bannerMember.php");
    ?>
    <form action="" method="GET">
        <div class="buscar">
            <input type="text" placeholder="Nombre del evento" name="search" class="nombreEvento" autocomplete="off" value="<?php if(isset($_GET['search'])) {echo $_GET['search']; } ?>">
            <div class="btn">
                <button type="submit" class="fa fa-search" style="font-size: 15px; margin-top: -3px; margin-left: -80px; 
                    border-radius: 32px; border: 0; outline: none; background-color: white; padding: 9px;">
                </button>
            </div>
        </div>
    </form>
    <!------ Eventos de búsqueda ------->
    <?php
        if(isset($_GET['search']))
        {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
            $query = mysqli_query($conexion,$sql);
            $numrows = mysqli_num_rows($query);
            $fetch = mysqli_fetch_array($query);

            if($numrows != 0)
            {
                $filtro = $_GET['search'];
                $sql = "SELECT * FROM categoria JOIN gustos on gustos.gustos = categoria.categoria JOIN eventos on 
                        eventos.nombre_evento LIKE '%$filtro%' AND categoria.id_evento = eventos.id_evento JOIN usuarios on 
                        usuarios.id_usuario = '$id' AND gustos.id_usuario = '$id' GROUP BY eventos.id_evento";
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
                                        <p class="eventName"> <b> Nombre del evento:  </b> <?php echo $fetch['nombre_evento'] ?> </p>
                                        <p class="description"> <b> Descripción del evento: </b> <?php echo $fetch['descripcion'] ?> </p>
                                        <p class="namePlace"> <b> Nombre del establecimiento: </b> <?php echo $fetch3['nombre_usuario'] ?> </p>
                                        <p class="direction"> <b> Dirección del establecimiento: </b> <?php echo $fetch['direccion'] ?> </p>
                                    </div>
                                    <center> <a href="visualizarEvento.php?id_evento=<?php echo urlencode($id_evento) ?>"> <button class="knowmore"> Saber mas del evento </button> </a> </center>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
    <!------ Eventos default ------->
    <?php
            }
        }
        else
        {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
            $query = mysqli_query($conexion,$sql);
            $numrows = mysqli_num_rows($query);
            $fetch = mysqli_fetch_array($query);

            if($numrows != 0)
            {
                $sql = "SELECT * FROM categoria JOIN gustos on gustos.gustos = categoria.categoria JOIN eventos on 
                        categoria.id_evento = eventos.id_evento JOIN usuarios on usuarios.id_usuario = '$id' 
                        AND gustos.id_usuario = '$id' GROUP BY eventos.id_evento";
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
                                    <p class="eventName"> <b> Nombre del evento:  </b> <?php echo $fetch['nombre_evento'] ?> </p>
                                    <p class="description"> <b> Descripción del evento: </b> <?php echo $fetch['descripcion'] ?> </p>
                                    <p class="namePlace"> <b> Nombre del establecimiento: </b> <?php echo $fetch3['nombre_usuario'] ?> </p>
                                    <p class="direction"> <b> Dirección del establecimiento: </b> <?php echo $fetch['direccion'] ?> </p>
                                </div>
                                <center> <a href="visualizarEvento.php?id_evento=<?php echo $id_evento ?>"> <button class="knowmore"> Saber mas del evento </button> </a> </center>
                            </div>
                    <?php
                        }
                    ?>
                </div>
    <?php
            }
    ?>
    <?php
        }
    ?>
</body>
</html>