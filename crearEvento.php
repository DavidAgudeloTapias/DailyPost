<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/business.JPG">
    <link rel="stylesheet" href="disenoBusiness.css">
    <title> Crear Evento </title>
</head>
<body>
    <?php
        include("bannerBusiness.php");
        include("conexion.php");

        $id = $_SESSION['id'];
        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
        $query = mysqli_query($conexion,$sql);
        $numrows = mysqli_num_rows($query);
        $fetch = mysqli_fetch_array($query);
        if($numrows != 0)
        {
    ?>
            <div class = "gustos">
                <div style = "display: flex;">
                    <div class="formulario">
                        <center> <h1 style="color:black; font-size: 35px;"> Ingrese la información del evento </h1> </center>
                        <form action="insertarEvento.php" method="POST" enctype="multipart/form-data" autocomplete="off" required>
                            <center> <input type="text" name="nombreEvento" placeholder="Nombre del evento" class="texto" required> </center>
                            <br>
                            <textarea name="descripcion" rows="7" placeholder="Descripcion del evento"></textarea>
                            <button class="selectPhoto"> <input type="file" name="foto_evento"  required> Seleccionar imagen del evento </button>
                    </div>
                                <div style="display: block; margin-top: 2vw; margin-left: 2.5vw;">
                                    <center><h2>Seleccione los gustos</h2></center>
                                    <center><h4>Música</h4></center>
                                    <center>
                                        <label><input type="checkbox" name="musica[]" value="rock">Rock</label>
                                        <label><input type="checkbox" name="musica[]" value="rap">Rap</label>
                                        <label><input type="checkbox" name="musica[]" value="regueton">Reguetón</label>
                                        <label><input type="checkbox" name="musica[]" value="pop">Pop</label>
                                        <label><input type="checkbox" name="musica[]" value="electro">Electrónica</label>
                                    </center>   
                                    <center><h4>Comida y Bebida</h4></center>
                                    <center>
                                        <label><input type="checkbox" name="comida[]" value="comida extranjera">Comida Extranjera</label>
                                        <label><input type="checkbox" name="comida[]" value="carne">Carne</label>
                                        <label><input type="checkbox" name="comida[]" value="comida tipica">Comida Típica</label>
                                        <label><input type="checkbox" name="comida[]" value="artesanal">Artesanal</label>
                                    </center>
                                    <center><h4>Tipos de Eventos</h4></center>
                                    <center>
                                        <label><input type="checkbox" name="salidas[]" value="conciertos">Conciertos</label>
                                        <label><input type="checkbox" name="salidas[]" value="cultural">Cultural</label>
                                        <label><input type="checkbox" name="salidas[]" value="fiestas">Fiestas</label>
                                        <label><input type="checkbox" name="salidas[]" value="campestre">Campestre</label>
                                        <label><input type="checkbox" name="salidas[]" value="bartour">Bartour</label>
                                    </center>
                                    <button type="submit" name="crear" class="createEvent"> Crear Evento </button>
                            </form>
                                </div> 
                </div>
            </div>
    <?php
        }
    ?>
</body>
</html>