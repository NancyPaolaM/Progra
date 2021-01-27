<?php
if(!isset($_SESSION))
session_start();
if(!(isset($_SESSION['permiso']) && $_SESSION['permiso']==1))
header("location:login.php");
?>