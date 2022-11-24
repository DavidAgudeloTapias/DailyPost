<!DOCTYPE html>
<?php $api_key = "AIzaSyD_BWobrWBnTHXrS3lF_KgypkMYSmI-Bv4"; // API Key Google Maps?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/member.JPG">
    <link rel="stylesheet" href="disenoMember.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$api_key?>" ></script>
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
                    while($fetch = mysqli_fetch_array($query2))
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
						<script type="text/javascript">
						  let map;
						  let marker;
						  let pos = { lat: <?php echo $fetch['latitud'] ?>, lng: <?php echo $fetch['longitud'] ?> };
						  $(document).ready(function(){
							  map = new google.maps.Map(document.getElementById("map"), {
								  zoom: 18,
								  center: pos,
								  mapTypeControl: false,
								  fullscreenControl: true,
								  zoomControl: true,
								  streetViewControl: false
							  });

							  marker = new google.maps.Marker({
								  position: pos, 
								  map: map, 
								  draggable: false,
							  });
						  });
						</script>

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
                            <form action="member.php">
                                <center> <button class="knowmore"> Volver al inicio </button> </center>
                            </form>
                        </div>
						<div id="map">
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
