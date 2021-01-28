<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>

    <body>

        <?php
        include_once("Layout/slide.php");
        ?>
        <?php
        include_once("Layout/navbar.php");
        ?>
        <div class="container pt-5">
            <div class="jumbotron">
                <h1 class="display-4 text-center "> Ingresar</h1> <br>
                <form action="autentifica.php" method="POST" id="formularioLogin">
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre de usuario</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Correo electrónico</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="login" value="accede">Iniciar</button>
                    <button type="button" class="btn btn-success stretched-link" href="index.php#">Registrar</button>

                </form>
            </div>
        </div>
        <script>
            $('#login').on('click', function() {

                $('#formularioLogin').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                        }
                    },
                    messages: {
                        email: {
                            required: "*Este campo es obligatorio.",
                            email: "*Debe tener el formato correo@Dominio.ext",
                        },
                        password: {
                            required: "*Este campo debe ser obligatorio.",
                        }
                    },
                    errorElement: "div",
                    errorClass: "text-danger",
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    },
                    submitHandler: function() {
                        var nuevoLogin = $('#formularioLogin').serialize();
                        $.ajax({
                            method: "POST",
                            url: "autentifica.php",
                            data: nuevoLogin,
                            success: function() {
                                window.location.replace("index.php");
                            }
                        })
                    }
                });
            });
        </script>

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
        <script src="../js/datatables.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/all.min.js"></script>



    </body>

    </html>