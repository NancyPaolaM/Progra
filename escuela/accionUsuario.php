<?php
//require_once("seguridad.php");
if (!isset($_POST["accion"]))
    die("murio");
$accion = $_POST["accion"];
switch ($accion) {
    case "create":
        agrega();
        break;
    case "readAll":
        leerTodo();
        break;
    case "read":
        leer();
        break;
    case "update":
        actualizar();
        break;
    case "delete":
        borrar();
        break;
    default:
        echo "opcion no existente";
}
function agrega()
{
    require_once("../conecta.php");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $idTer = $_POST['idTer'];

    if (mysqli_query($conec, "insert into usuario(nombre, apellido, email, password, idTer) values ('$nombre', '$apellido', '$email', '$password', $idTer)"))
        header("location:usuario.php?mensaje=ok");
    else
        header("location:usuario.php?mensaje=error");
}

function leerTodo()
{
    require_once("../conecta.php");
    $resultado = mysqli_query($conec, "select * from usuario");
    echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr><tr>" .

            $fila["userID"] . "</td><tr>" . $fila["nombre"] . "</td><tr>" . $fila["apellido"] . "</td><tr>" . $fila["email"] . "</td><tr>" . $fila["password"] . "<br>";
    }

function leer()
{
    require_once("../conecta.php");
    $resultado = mysqli_query($conec, "select * from usuario where idUser=" . $_POST["idUser"]);
    echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr><td>" .
            $fila["idUser"] . "</td><td>" . $fila["nombre"] . "</td><tr>";
    }

{
    require_once("../conecta.php");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $idTer = $_POST['idTer'];
    if (mysqli_query($conec, "update usuario set nombre='$nombre', apellido='$apellido', email='$email', password='$password', idTer=$idTer where idUser=" . $_POST["idUser"]))
        echo "ok";
    else
        echo "error";
}

function borrar()
{
    require_once("../conecta.php");


    if (mysqli_query($conec, "delete from usuario where idUser=" . $_POST["idUser"])) {
        echo "se borro";
    } else {
        echo "no se borro";
    }
}
}