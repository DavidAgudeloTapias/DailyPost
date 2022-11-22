<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="imagenes/business.JPG">
    <link rel="stylesheet" href="disenoBusiness.css">
    <title>Editar Perfil</title>
</head>
<body>
    <?php
        include("bannerBusiness.php");
    ?>
    <h2> Editar información del perfil </h2>
    <form action="cambiarInfoBusiness.php" method="POST" autocomplete="off" required>
        <div class="botonImagen">
            <td>
                <img src="data:image/jpg;base64,<?php echo base64_encode($fetch['foto']); ?>" class="imageBusiness2">
            </td>
            <input type="file" name="foto" class="botonSeleccionar">
        </div>
        <center>
            <div class="formularioInfoNueva">
                <h4>Nombre</h4>
                <input type="text" name="nombre" placeholder="nombre" class="" value="<?php echo $fetch['nombre_usuario']; ?>" required>
                <br>
                <h4>Usuario</h4>
                <input type="text" name="usuario" placeholder="Usuario" class="texto" value="<?php echo $fetch['usuario']; ?>" required>
                <br>
                <h4>Contraseña</h4>
                <input type="text" name="clave" placeholder="Clave" class="texto" value="<?php echo $fetch['clave']; ?>" required>
                <br>
                <button type="submit" class="actualizar" name="enviar">Cambiar información</button>
            </div>
        </center>
    </form>
</body>
</html>