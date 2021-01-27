<?php
require_once("seguridad.php");
if (!isset($_POST["accion"]))
    die("no existe");
$accion = $_POST["accion"];
switch ($accion) {
    case "create":
        agrega();
        break;
    case "update":
        actualizar();
        break;
    case "delete":
        eliminar();
        break;
    default:
    echo "opcion no existente";
}
function agrega()
{
    require_once("../conecta.php");
    $idAnuncio = $_POST['idAnuncio'];
    $titulo = $_POST['titulo'];
    $anuncio = $_POST['anuncio'];
    $fecha = $_POST['fecha'];
    $userID = $_POST['userID'];
    if (mysqli_query($conec, "INSERT INTO
    `anuncios`(`idAnuncio`,`titulo`, `anuncio`, `fecha`, `userID`) values
    --  anuncios (titulo,anuncio,fecha,userID) 
      ('$idAnuncio','$titulo', '$anuncio', '$fecha','$userID')"))
        header("location:anuncios.php?mensaje=ok");
    else
    header("location:anuncios.php?mensaje=error");
}


function actualizar()

{
    require_once("../conecta.php");
    $titulo = $_POST['titulo'];
    $anuncio = $_POST['anuncio'];
    $fecha = $_POST['fecha'];
    if(mysqli_query($conec, "UPDATE anuncios set titulo='$titulo', anuncio='$anuncio', fecha='$fecha' where idAnuncio=" .$_POST["idAnuncio"]))
    echo"ok";
    else
    echo "error";
}

function eliminar()
{
    require_once("../conecta.php");
   
    
    if(mysqli_query($conec, "DELETE from anuncios  where idAnuncio=".$_POST["idAnuncio"])){
    echo"ok";
} else{
    echo "error";
}}
?>
