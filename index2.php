<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index2.php"method="get">
    <input type="text" name="numero1">
    <input type="text" name="numero2">
    <input type="submit" name="Enviar">
    </form>
    <?php
    if(isset($_GET["numero1"]) && isset($_GET["numero2"])){
        $num1=$_GET["numero1"];
        $num2=$_GET["numero2"];

        for($num1;$num1<=$num2;$num1++){
             if($num1%2==0)
             print($num1. " ,");
        }
         }
    ?>
</body>
</html>