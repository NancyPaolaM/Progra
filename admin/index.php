<?php // require_once("seguridad.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap copy.css">
</head>

<body>
    <?php include_once("layout/navbar.php"); ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col-6">

                <div class="card cardini2 text-white bg-primary mb-3">
                    <div class="card-header nvb1">Anuncios importantes para la comunidad estudiantil</div>
                    <div class="card-body">
                        <?php 
                    require_once("../conecta.php");
                    
                    $resultado=mysqli_query ($conec, "SELECT idAnuncio,titulo,anuncio,fecha,nombre FROM anuncios 
                    INNER JOIN usuario ON  anuncios.userID=usuario.userID order by fecha desc");
                   
                   while ($fila = mysqli_fetch_array($resultado)) {

                    echo '<div>';
                    echo '<div>';
                    echo '<div>';
                    echo '<div class="card p-3 text-dark" style="max-yellow: 18rem;">';
                    echo ' <div class="card cardini2 text-white bg-primary mb-3">';
                    echo   $fila['titulo']; 
                    echo '</div>';
                    echo '<div class="card-body" style="background-color:#CFC" >';
                    echo '<blockquote>';
                    echo '<p><b>' . $fila['anuncio'] .'</b></p>';
                    echo "<br>";
                    echo '<footer><i> ' . $fila['nombre'] . '<cite title="Source Title"> (' . $fila['fecha'] . ')</i></cite></footer>';
                   
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    echo"<br>";
                    
                    
                }
                ?>


                        <script src="../js/jquery-3.5.1.min.js"></script>
                        <script src="../js/bootstrap.bundle.min.js"></script>
                        <script src="../js/all.js"></script>
</body>

</html>