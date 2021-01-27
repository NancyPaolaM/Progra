<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcador</title>
    <link rel="stylesheet" href="css/bootstrap copy.css">

</head>
<body class="container mt-5">
<form action="marcador.php" method="POST">

<input type="submit" name="local" value="1">
<input type="submit" name="local" value="2">
<input type="submit" name="local" value="3">
<hr>
<input type="submit" name="visitante" value="1">
<input type="submit" name="visitante" value="2">
<input type="submit" name="visitante" value="3">
<hr>
<input type="submit" name="rst" value="reiniciar">
</form>
<?php
session_start();
if(!isset($_SESSION["local"])&&!isset($_SESSION["visitante"])){ 
$_SESSION["local"]=0;
$_SESSION["visitante"]=0;
}
else{
if (isset($_POST["local"]))
$_SESSION["local"]+=$_POST["local"];
if(isset($_POST["visitante"]))
$_SESSION["visitante"]+=$_POST["visitante"];
}
echo$_SESSION["local"]."<br>";
echo$_SESSION["visitante"]."<br>";

?>

</body>
</html>