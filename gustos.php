<!DOCTYPE html>
<html>
    <head>
        <title>Gustos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="logo jorge.png">
        <link rel="stylesheet" href="diseno.css">
    </head>
    <body>
        <div class="gustos">
            <div style="display: flex;">
                <img src="imagenes/member.JPG">
                <div style="display: block; margin-top: 2vw; margin-left: 2.5vw;">
                    <center><h3>Elige tus gustos.</h3></center>
                    <center><h4>Música</h4></center>
                    <form action="paso1.php" method="POST">
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
                        <button type="submit" name="enviar" id="enviar">Enviar</button>
                    </form>
                </div> 
            </div>
        </div>
    </body>
</html>