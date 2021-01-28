<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap copy.css">
</head>
<body class="container">
    <form action="autentifica.php" method="POST" id="formularioLogin">
    usuario:
    <input type="text" name="email" id="" class="form-control">
    Contraseña:
    <input type="text" name="password" id="" class="form-control">
    <hr>
    <input type="submit" value="Accede" id="login" class="btn btn-primary">
    </form>
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.js"></script>

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
</body>
</html>