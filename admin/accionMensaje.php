<?php //require_once("seguridad.php");
?>
<?php
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
    $nombre= $_POST['nombre'];
    $correo=$_POST['email'];
      $idDep=$_POST['idDep'];
      $texto=$_POST['texto'];
      $estado="ABIERTO";
      require_once("../conecta.php");
     if (mysqli_query($conec, "INSERT INTO mensaje(mensaje,fecha,status, emailUsr,nombreAlumno,idDep) VALUES
     ('$texto',CURRENT_TIMESTAMP,'$estado','$correo','$nombre',$idDep)"))    
     
    
    
        header("location:mensajes.php?mensaje=ok");
    else
    header("location:mensajes.php?mensaje=error");
}




function  actualizar(){
    require_once("../conecta.php");
    
    //echo$_POST['idMensaje'];
    $status="CERRADO";
    if(mysqli_query($conec,"UPDATE mensaje SET status='$status' where idMensaje=".$_POST['ID']))
    
    header("location:mensajes.php?mensaje=ok");
    else
    header("location:mensajes.php?mensaje=error");
   
  
   }

?>
