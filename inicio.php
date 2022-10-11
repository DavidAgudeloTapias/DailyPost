<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body
    {
      background-color: #121212;;
    }
    </style>
  </head>
  <body>
    <?php 
      
      include("conexion.php");
      $id=$_SESSION['id'];

      $sql="SELECT * FROM usuarios WHERE id_usuario='$id'";
      $q=mysqli_query($conexion,$sql);
      $n=mysqli_num_rows($q);
      $v=mysqli_fetch_array($q);
      if($n!=0)
      {
    ?>
        <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <?php
      $sql="SELECT * FROM gustos WHERE idu=$id";
      $q=mysqli_query($conexion,$sql);
      while($v=mysqli_fetch_array($q))
      {
        ?>
          <h4><?php echo $v['gus'] ?></h4>
        <?php 
      }
    ?>
        </center> 
    <?php
      }
      else
      {
        header("location:index.php");
      }
    ?>
  </body>
</html>