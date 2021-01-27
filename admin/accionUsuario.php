<?php
//require_once("seguridad.php");
if (!isset($_POST["accion"]))
    die("murio");
$accion =$_POST["accion"];
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
    $pass = $_POST['pass'];
    $idDep = $_POST['idDep'];

    if (mysqli_query($conec, "insert into usuario(nombre, apellido, email, pass, idDep) values ('$nombre', '$apellido', '$email', '$pass', $idDep)"))
        header("location:Usuario.php?mensaje=ok");
    else
    header("location:Usuario.php?mensaje=error");
}

function leerTodo(){
    require_once("../conecta.php");
    $resultado = mysqli_query($conec, "select * from usuario");
     echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr><tr>" .

            $fila["userID"]."</td><tr>".$fila["nombre"]."</td><tr>".$fila["apellido"]."</td><tr>".$fila["email"]."</td><tr>".$fila["pass"]."<br>";
    }
    echo "</table>";
}

function leer()
{
    require_once("../conecta.php");
    $resultado = mysqli_query($conec, "select * from usuario where userID=" . $_POST["userID"]);
        echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr><td>" .
    $fila["userID"] . "</td><td>" . $fila["nombre"] . "</td><tr>";
    }
    echo "</table>";
}
function actualizar()

{
    require_once("../conecta.php");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $idDep = $_POST['idDep'];
    if(mysqli_query($conec, "update usuario set nombre='$nombre', apellido='$apellido', email='$email', pass='$pass', idDep=$idDep where userID=" .$_POST["userID"]))
    echo"ok";
    else
    echo "error";
}

function borrar()
{
    require_once("../conecta.php");
   
    
    if(mysqli_query($conec, "delete from usuario where userID=".$_POST["userID"])){
    echo"se borro";
} else{
    echo "no se borro";
}}
?>
