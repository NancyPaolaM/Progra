<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>
    <link rel="stylesheet" href="css/bootstrap copy.css">

</head>
<body class="container">
    <form action=p.php method="get">
        <br>
        <h1>Casa de Apuestas</h1>
        Inicializacion: Casa $100 y presupuesto $100<br><br>
        ¿Cuanto dinero quieres apostar?   <input type="text" name="apuesta" class="container mt-12" ><br> 
        Elige un numero entre 1 al 6      <input type="text" name="numero1" class="container" ><br><br> 
        <input type="submit" value="enviar" style="margin-left:4%" ;><br><br>
        
        
        
    <?php
    session_start();
    if(!isset($_SESSION ["cliente"]) && !isset($_SESSION["casa"])){
        $_SESSION["cliente"]=100;
        $_SESSION["casa"]=100;
        $random = rand(1, 6);
     }else{
        $random =rand(1, 6);
        
    if (isset($_GET["numero1"]) && isset($_GET["apuesta"])) {
        $numero1 = $_GET['numero1'];
        $apuesta=$_GET['apuesta'];

    if($numero1 == $random){
            $_SESSION["casa"]-= $apuesta;
            $_SESSION["cliente"] += $apuesta;
            echo ("<br>Ganaste, el numero es igual al dado");
            echo("<br> tu apuesta es de: ".$_SESSION["cliente"]."<br>");
            echo("tu estado actual despues del tiro es de: " .$_SESSION["cliente"]."<br>");
            echo("el saldo de la casa es de: " .$_SESSION["casa"]);
    }else{ 
            $_SESSION["casa"]+= $apuesta;
            $_SESSION["cliente"] -= $apuesta;
            echo ("<br>Perdiste, no acertaste");
            echo("<br>tu apuesta es de: " .$_SESSION["cliente"]."<br>");
            echo("tu estado actual despues del tiro es de: " .$_SESSION["cliente"]."<br>");
            echo("el saldo de la casa es de: " .$_SESSION["casa"]);

        if ($_SESSION['cliente'] <=0){
            echo "<br><br> Perdiste, te quedaste sin presupuesto";
}
    }
        }
            }
    ?>
    </form>
        </body>
            </html>