<?php 
     require_once("../php/coneccion.php");
     require_once("seguridad.php");

     $estado=mysqli_query($con,"SELECT nombre,apellido,nombreDepartamento FROM alumnos_registro INNER JOIN 
     departamento ON alumnos_registro.idDep=departamento.idDep WHERE ID=".$_SESSION['ID']);

     while ($fila = mysqli_fetch_array($estado)) {
       $nombre=$fila['nombre'];
       $dep=$fila['nombreDepartamento'];
       $apellido=$fila['apellido'];
     }
     echo"<div class='card col-3 bg-light mt-4' style='margin-left:38%; '>";
     echo"<h4  class='text-center'>Bienvenido(a):</h4>";
     echo'<h5 class="text-primary text-center mt-1">'.'<u>'.' '.$nombre. ' '.$apellido.'</u>'. '</h5>';
     echo"<h4  class='text-center mt-1'>Departamento asignado:</h4>";
     echo'<h5 class="text-primary text-center mt-1"><u>'.$dep.'</u></h5>';
     echo"</div>";
     echo'<img src="../../img/logo3.png" class="offset-4" style="margin-top:3%  ;">';
     ?>     
    