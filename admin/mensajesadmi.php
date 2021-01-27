<?php require_once("seguridad.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap copy.css">
    <title>Mensajes del administrador</title>
</head>

<body class>
<?php 
include_once("layout/navbar.php");
?>

    <div class="container text-white" style="margin-top: 2%; ">
        <div class="row container">
            <div class="col-10  offset-1 container">
                  
                <form action="accionMensaje.php" method="post">
                  
                    <?php require_once("../conecta.php");
                    echo ' <input type="hidden" name="accion" value="update">';
                    $mostrar = mysqli_query($conec,'SELECT * FROM mensaje WHERE idDep='.$_SESSION["permiso"] ) ;
                    while ($fila = mysqli_fetch_array($mostrar)) {
                        echo '<div class="card cardini2 text-white bg-primary mb-3";">';
                        echo '<div class="card-header nvb1"">';
                        echo '<div class="card-body">';
                        echo $fila['fecha'] . " (" . $fila['STATUS'].")";
                        echo ' </div>';
                        echo ' <div class="card-body">';
                        echo ' ' . $fila['nombreAlumno'] ;
                        echo '  (' . $fila['emailUsr'] . ')';
                        echo '  <p>' . $fila['mensaje'] . '</p>';

                        
                        
                        $mostrar2 = mysqli_query($conec, "SELECT * FROM departamento WHERE idDep=" . $fila['idDep']);
                        while ($fila = mysqli_fetch_array($mostrar2)) {
                            echo '<br>';
                            echo '<strong class="card-title ">Dirigido para: ' . $fila['nombreDepartamento'] . '</strong></h4>';
                        
                        }
                        echo "<button class='btn btn-primary offset-5 mt-5' 
                        
                        name='ID' value='".$fila['idMensaje']."'>Cerrar</button> "; 
                        echo ' </div>';
                        echo '</div>';
                        echo "<br> <br>";
                        
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>