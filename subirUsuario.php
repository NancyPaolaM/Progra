<?php
if(!isset($_GET["accion"]))
    die ("Accion no existe");

  $accion=$_GET["accion"];
  switch ($accion){
    case "create":
      agrega();
    break; 
    case "readAll":
      leerTodo();
    break;
    default:
      echo "Opcion no existente";

  }

  function agrega(){
    require_once("conecta.php");
    $nombre=$_GET ['nombre'];
    $apellido=$_GET ['apellido'];
    $email=$_GET ['email'];
    $pass=$_GET ['pass'];
  if (mysqli_query($conec, "INSERT INTO usuario (nombre, apellido, email, pass) VALUES ('$nombre', '$apellido', '$email', '$pass')"))
    echo("location:conecta.php");
  else
    echo"Error";
  }

  function leerTodo(){
    require_once("conecta.php");
    $resultado=mysqli_query($conec, "SELECT * FROM usuario");
    while($fila=mysqli_fetch_array($resultado)){
      echo $fila ["userID"]."</td>";
      echo $fila ["nombre"];


    }
  }


  
?>