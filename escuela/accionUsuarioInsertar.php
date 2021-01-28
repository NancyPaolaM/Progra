<?php
    require_once("./conecta.php");
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    if (mysqli_query($conec, "insert into usuario(nombre, apellido, correo, pass, idTer) values ('$nombre', '$apellido', '$correo', '$pass', 1)"))
        echo "insertado";
    else
        echo "no insertado";
