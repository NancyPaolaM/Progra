<?php require_once("seguridad.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
  
<?php
    include_once("Layout/slide.php")
    ?>
    <?php
    include_once("Layout/navbar.php")
    ?>

    <div class="container"> <br>
      <div class="card mt4">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title">¿Quienes somos?</h5>
              <h6 class="card-subtitle mb-2 text-muted">16 de Septiembre de 2010</h6>
              <p class="card-text">Somos un proyecto impulsado por gente comprometida con la transformación educativa.
              Comprendemos la importancia de formar alumnos capaces de enfrentar los retos de la vida actual y prepararlos para ser ciudadanos del mundo del siglo XXI.</p>
              <a href="#" class="card-link">Saber más</a>
             
           </div>
             <div class="col-4 offset-2">
                <img src="image/siu.png" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container"> <br>
      <div class="card mt4">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title">Somos un proyecto de vida</h5>
              <h6 class="card-subtitle mb-2 text-muted">16 de Septiembre de 2010</h6>
              <p class="card-text">Nuestra escuela es un lugar para todos los niños, no basado en la idea que todos son iguales, si no que todos son diferentes.</p>
              <a href="#" class="card-link">Misión y visión</a>
            </div>
             <div class="col-4 offset-2">
                <img src="image/Foto.jpg" class="img-fluid">
             </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container"> <br>
      <div class="card mt4">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title">Escuela segura</h5>
              <h6 class="card-subtitle mb-2 text-muted">16 de Septiembre de 2010</h6> <br>
              <p class="card-text">1. Escuela Cero-Bullying</p>
              <p class="card-text">2. Todo nuestro personal está capacitado en primeros auxilios. Realizamos simulacros, donde los alumnos aprenden la forma correcta de actuar en caso de emergencia.</p>
              <a href="#" class="card-link">Ver más</a>
             
           </div>
             <div class="col-4 offset-2">
                <img src="image/docente.png" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container"> <br>
      <div class="card mt4">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <h5 class="card-title">Calidad docente</h5>
              <h6 class="card-subtitle mb-2 text-muted">16 de Septiembre de 2010</h6>
              <p class="card-text">Nuestro equipo está conformado por
              profesores certificados en las áreas de: Aprendizaje, Psicología, Pedagogía, Inglés, Tecnología, Lenguaje y Comunicación, Neuropsicología, Desarrollo físico y
              Educación artística quienes están a la vanguardia en materia educativa y en constante Actualización y Capacitación.</p>
              <a href="#" class="card-link">Ver más</a>
             
           </div>
             <div class="col-4 offset-2">
                <img src="image/calidad.jpg" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div><br>

    <div class="container-fluid bg-primary text-white" ><br>
    <div class="row mt-2">
    <div class="col-6">
    <h4>DIRECCIÓN</h4>
    <p>Calle Explanada, esquina con Calle Candelaria, Mza 65-B, Lote 15, Ojo de Agua, Tecámac, Estado de México, CP 55770.</p>
    </div>
    <div class="col-6">
    <h4>CONTACTO</h4>
    <ul>
    <li><a href="escuela@gmail.com"class="correofunt text-white">escuela@gmail.com</a></li>
    <li><a href="4611234567"class="tel text-white">4611234567</a></li>
    <li><a href="escuela@gmail.com"class="correofunt text-white ">correo1@dominio.ext</a></li>

    </ul>
    </div>

    </div>

        <script>src = "js/jquery-3.1.1.js"</script>
        <script>src = "js/bootstrap.bundle.min.js"</script>
        <script>src = "js/jquery.validate.js"</script>
        <script>src = "js/all.min.js"</script>
</body>

</html>
