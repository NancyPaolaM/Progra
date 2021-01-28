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
            include_once("Layout/navbar.php");
        ?>
        <?php
            include_once("Layout/slide.php");
        ?>

        <br><br>
        <!-- Formulario -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Inicio de Sesión</h5>
                            <form method="post" id="formularioLogin">
                                <div class="col-sm-12">
                                    <div class="row mb-3">
                                        <label for="correo" class="col-sm-4 col-form-label">Correo Electrónico:</label>
                                        <input type="correo" class="col-sm-8 form-control" name="correo" id="correo">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="pass" class="col-sm-4 col-form-label">Contraseña:</label>
                                        <input type="password" class="col-sm-8 form-control" name="pass" id="pass">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-success" id="login" value="Iniciar">
                                    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal"></button> -->
                                    <button type="button" class="btn btn-primary agregar" data-bs-toggle="modal" data-bs-target="#exampleModal" id="miModal">Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <!-- Modal -->
        <div class="modal" role="dialog">

        </div>

        <?php
            include_once("Layout/footer.php");
        ?>

        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- <script src="../js/datatables.min.js"></script> -->
        <script src="js/jquery.validate.js"></script>
        <script src="js/all.min.js"></script>
        <script>
            $('#login').on('click', function() {
                $('#formularioLogin').validate({
                    rules: {
                        correo: {
                            required: true,
                            email: true,
                        },
                        pass: {
                            required: true,
                        }
                    },
                    messages: {
                        correo: {
                            required: "Campo requerido",
                            email: "Debe tener el formato correo@Dominio.ext",
                        },
                        pass: {
                            required: "Campo requerido.",
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
        <script>
            $(".agregar").on("click", function() {
                $(".modal").load("modalAgregar.php")
                $(".modal").modal();
            });
        </script>

    </body>

    </html>