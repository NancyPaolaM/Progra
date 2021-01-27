<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
      <?php
       include_once("Layout/slide.php");
      ?>
      <?php
       include_once("Layout/navbar.php");
      ?> <br>
    <div class = "container pt-5 jumbotron"> <br>
         <h1 class="display-4 text-center ">Contacto</h1>
         <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Nombre</label>
           <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nombre">
         </div>
         <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Correo electrónico</label>
           <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="correo@dominio.com">
         </div>
         <div class="mb-3">
         <div class="mb-3">
           <label for="exampleFormControlInput1" class="form-label">Teléfono</label>
           <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Teléfono">
         </div>
           <label for="exampleFormControlInput1" class="form-label">Asunto</label>
           <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Asunto">
         </div>
         
         <div class="mb-3">
           <label for="exampleFormControlTextarea1" class="form-label">Mensaje</label>
           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
         </div>
         
           <button type="submit" class="btn btn-primary">Enviar</button>
        

    </div> 
    <div class="container-fluid bg-primary text-white"><br>
                        <div class="row mt-2">
                            <div class="col-6">
                                <h4>DIRECCIÓN</h4>
                                <p>Calle Explanada, esquina con Calle Candelaria, Mza 65-B, Lote 15, Ojo de Agua, Tecámac, Estado de México, CP 55770.</p>
                            </div>
                            <div class="col-6">
                                <h4>CONTACTO</h4>
                                <ul>
                                    <li><a href="escuela@gmail.com" class="correofunt text-white">escuela@gmail.com</a></li>
                                    <li><a href="4611234567" class="tel text-white">4611234567</a></li>
                                    <li><a href="escuela@gmail.com" class="correofunt text-white">correo1@dominio.ext</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <script src="js/jquery-3.1.1.js"></script>
                    <script src="js/bootstrap.bundle.min.js"></script>

                    <script src="js/jquery.validate.js"></script>
                    <script src="js/all.min.js"></script>

</body>
</html>