<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" href="diseño.css">		
	</head>
	<body>
		<div style="display: flex;">
			<div class="caja">
				<img src="imagenes/member.JPG">
				<form method="POST" class="form-member" autocomplete="off">
					<p>Con Daily Post Member verás los eventos a los cuales te gustaría ir, conociendo su fecha,
					su hora, y sus detalles.</p>
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="clave" placeholder="Contraseña">
					<center><button type="submit" name="enviar">Login</button></center>
				</form>
			</div>	
			<div class="caja2">
				<img src="imagenes/business.JPG">
				<form method="POST" class="form-member2" autocomplete="off">
					<p>Con Daily Post Business podrás crear eventos con los cuales la gente asistirá a ellos, estableciendo lugar, fecha y hora.</p>
					<input type="text" name="usuario" placeholder="Usuario">
					<input type="password" name="clave" placeholder="Contraseña">
					<center><button type="submit" name="enviar2">Login</button></center>
				</form>
			</div>
		</div>
		<div class="banner2">
            <img src="logo.png" class="logo">
            <a href="index.php"><button class="boton5">Volver al Inicio</button></a>
        </div>
	</body>
</html>
<?php
	if(isset($_POST['enviar']))
	{
		session_start();
		include("conexion.php");
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];

		$sql="SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave' and clase!=2";
		$query=mysqli_query($conexion,$sql);
		$rows=mysqli_num_rows($query);
		$array=mysqli_fetch_array($query);

		if($rows!=0)
		{
			$_SESSION['id']=$array['id_usuario'];
			if($array['clase']==1)
			{
				header("location:gustos.php");
			}
			if($array['clase']==0)
			{
				header("location:member.php");
			}
		}
		else
		{
			header("location:login.php");
		}
	}

	if(isset($_POST['enviar2']))
	{
		session_start();
		include("conexion.php");
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];

		$sql="SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave' and clase=2";
		$query=mysqli_query($conexion,$sql);
		$rows=mysqli_num_rows($query);
		$array=mysqli_fetch_array($query);

		if($rows!=0)
		{
			$_SESSION['id']=$array['id_usuario'];
			header("location:inicio2.php");
		}
		else
		{
			header("location:login.php");
		}
	}
?>