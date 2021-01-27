<?php
   $conec = mysqli_connect('localhost', 'root', '', 'helpdesk');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/bootstrap copy.css">
</head>
<body>
   <form action="subirUsuario.php" method = "GET" class="text-aligment-center">
   <div class="form-group" class="text-aligment-center">
       <label for="nombre" >Nombre: </label><br>
       <input type="text" name="nombre">
   </div>
   <div class="form-group">
       <label for="apellido">Apellido: </label><br>
       <input type="text" name="apellido">
   </div>
   <div class="form-group">
       <label for="email">Correo: </label><br>
       <input type="email" name="email">
   </div>
   <div class="form-group">
       <label for="pass">Password: </label><br>
       <input type="password" name="pass">
   </div>
   <button type="submit" class="btn btn-outline-primary">Agregar</button><br>
   </form>
</body>
</html>