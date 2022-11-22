<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Daily Post</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" href="diseno.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    </head>
    <body>
        <div class="banner">
            <a href="index.php"><img src="logo.png" class="logo"></a>
            <div class="botones">
                <a href="#contactenos"><button class="boton2">Contáctenos</button></a>
                <a href="#registro"><button class="boton">Registro</button></a>
                <a href="login.php"><button class="boton3">Login</button></a>
            </div>
        </div>
        <style>
            body
            {
                background-color: #121212;
            }
        </style>
        <div class="contenedor-slider">
            <div class="slider" id="slider">
                <section class="seccionslider"><img src="imagenes/img7.jpg"></section>
                <section class="seccionslider"><img src="imagenes/img8.jpg"></section>
                <section class="seccionslider"><img src="imagenes/img9.jpg"></section>
                <section class="seccionslider"><img src="imagenes/img10.jpg"></section>
            </div>
            <div id="antes" class="antes">&#60;</div>
            <div id="despues" class="despues">&#62;</div>
        </div>          
        <script type="text/javascript">

            var slider=$('#slider');
            var siguiente = $('#despues');
            var anterior = $('#antes');
            $('#slider .seccionslider:last').insertBefore('#slider .seccionslider:first');
            slider.css('margin-left', '-'+100+'%');

            function moverD() 
            {
                slider.animate(
                {
                    marginLeft:'-'+200+'%'
                } 
                ,700, 
                function()
                {
                    $('#slider .seccionslider:first').insertAfter('#slider .seccionslider:last');
                    slider.css('margin-left', '-'+100+'%');
                });
            }

            function moverI() 
            {
                slider.animate(
                {
                    marginLeft:0
                } 
                ,700, 
                function()
                {
                    $('#slider .seccionslider:last').insertBefore('#slider .seccionslider:first');
                    slider.css('margin-left', '-'+100+'%');
                });
            }

            function autoplay() 
            {
                interval = setInterval(function()
                {
                    moverD();
                }, 6000);
            }  

            siguiente.on('click',function() {
                moverD();
                clearInterval(interval);
                autoplay();
            });

            anterior.on('click',function() {
                moverI();
                clearInterval(interval);
                autoplay();
            });

            autoplay();

        </script>    
            <div class="info">
                <p class="letra">Aquí encontrarás todo tipo de eventos, te enviaremos datos de cada uno. Para más información, únete a nuestra comunidad.</p>
            </div>
        <a name="contactenos">
        </a>
            <div class="contactenos">
                <b><p class="letra7"> Contáctenos.</p></b>
                <div class="contacto">
                    <div style="display: flex;">
                        <p class="textonombre">Nombre.</p>
                        <p class="textoasunto">Asunto.</p>
                        <p class="textoredes">Redes Sociales.</p>
                    </div>
                    <br>
                    <form action="mensaje.php" method="POST" autocomplete="off">
                        <div style="display: flex;">
                            <input type="text" name="nombre" class="nombre" placeholder="Nombre" required autocomplete="off">
                            <input type="text" name="asunto" class="asunto" placeholder="Asunto" required autocomplete="off ">
                            <img src="imagenes/whatsapp.png" class="whatsapp">
                            <p class="textowhatsapp"> Whatsapp : +57 3226403046</p> 
                        </div> 
                        <br>
                        <div style="display: flex;">
                            <p class="textomensaje">Mensaje.</p>
                            <img src="imagenes/instagram.png" class="instagram">
                            <p class="textoinstagram"> Instagram : @DailyPost</p>
                        </div>
                        <div style="display: flex;">
                            <textarea name="mensaje" class="mensaje" rows="10" cols="40" placeholder="Escribe aquí tu mensaje" autocomplete="off" required></textarea>
                            <img src="imagenes/gmail.png" class="gmail">
                            <p class="textogmail"> Gmail: dailypost@gmail.com</p>
                        </div> 
                        <button type="submit" class="enviar">ENVIAR</button>                            
                    </form>
                    <br>
                </div>                    
            </div>
        <a name="registro">
        </a> 
            <main>
                <div class="contenedor_todo">
                    <div class="caja_trasera">
                        <div class="caja_trasera_business">
                            <h3>Quieres ser parte de nosotros?</h3>
                            <p>Registrate aquí</p>
                            <button id="btn_member">Daily Post Member</button>
                        </div>

                        <div class="caja_trasera_member">
                            <h3>Quieres registrar tu negocio?</h3>
                            <p>Registra tu negocio aquí</p>
                            <button id="btn_business">Daily Post Business</button>
                        </div>
                    </div>

                    <div class="contenedor_member_business">
                        <form action="insertar.php" method="POST" class="formulario_member" enctype="multipart/form-data"> 
                            <h2>Únete a nosotros</h2>
                            <input type="text" name="nombre" placeholder="Nombre" autocomplete="off">
                            <input type="email" name="correo" placeholder="Correo electrónico" autocomplete="off">
                            <input type="text" name="usuario" placeholder="Usuario" autocomplete="off">
                            <input type="password" name="clave" placeholder="Contraseña" autocomplete="off">
                            <input type="file" name="foto">
                            <center><button type="submit" name="enviar1">Registrarme</button></center>
                        </form>

                        <form action="insertar.php" method="POST" class="formulario_business" enctype="multipart/form-data">
                            <h2>Registra tu negocio</h2>
                            <input type="text" name="nombre" placeholder="Nombre de la empresa" autocomplete="off">
                            <input type="email" name="correo" placeholder="Correo electrónico" autocomplete="off">
                            <input type="text" name="usuario" placeholder="Usuario" autocomplete="off">
                            <input type="password" name="clave" placeholder="Contraseña" autocomplete="off">
                            <input type="file" name="foto">
                            <center><button type="submit" name="enviar2">Registrar Negocio</button></center>
                        </form>
                    </div>
                </div> 
            </main> 
            <script type="text/javascript">

                document.getElementById("btn_member").addEventListener("click", member);
                document.getElementById("btn_business").addEventListener("click", business);

                var contenedor_member_business=document.querySelector(".contenedor_member_business");
                var formulario_business=document.querySelector(".formulario_business");
                var formulario_member=document.querySelector(".formulario_member");
                var caja_trasera_business=document.querySelector(".caja_trasera_business");
                var caja_trasera_member=document.querySelector(".caja_trasera_member");

                function member()
                {
                    formulario_member.style.display = "block";
                    contenedor_member_business.style.left = "0.4vw";
                    formulario_business.style.display = "none";
                    caja_trasera_member.style.opacity = "1";
                    caja_trasera_business.style.opacity = "0";
                }

                function business()
                {
                    formulario_member.style.display = "none";
                    contenedor_member_business.style.left = "22vw";
                    formulario_business.style.display = "block";
                    caja_trasera_member.style.opacity = "0";
                    caja_trasera_business.style.opacity = "1";
                }

            </script>     
        <div class="footer">
            <div class="letrafooter"><h4>Daily Post® 2022</h4></div>
        </div>
    </body>
</html>