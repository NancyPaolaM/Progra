<?php
    if(!isset($_SESSION))
    session_start();
    require_once("conecta.php");
    $correo=$_POST['correo'];
    $password=$_POST['pass'];
    $query=mysqli_query($conec, "SELECT * FROM usuario WHERE correo='$correo' AND pass='$password'");
    $renglon=$query->num_rows;
    if($renglon==1){
        while ($fila=mysqli_fetch_array($query)){
            $_SESSION['idUser']=$fila['idUser'];
        }
        $_SESSION['permiso']=1;        
        header("location:index.php");
    } else
    echo "Usuario no Registrado";
?>