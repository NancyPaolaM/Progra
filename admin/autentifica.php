<?php
if(!isset($_SESSION))
session_start();
require_once("../conecta.php");
$email=$_POST['email'];
$password=$_POST['password'];
$query=mysqli_query($conec, "SELECT * FROM usuario WHERE email='$email' AND pass='$password'");
$renglon=$query->num_rows;
    if($renglon==1){
        while ($fila=mysqli_fetch_array($query)){
            $_SESSION['userID']=$fila['userID'];


        }
        $_SESSION['permiso']=1;
        
        header("location:index.php");
    }
    else
    echo"no esta";

?>
