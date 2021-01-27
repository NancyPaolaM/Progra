<?php require_once("seguridad.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <link rel="stylesheet" href="../css/bootstrap copy.css">
</head>

<body>

    <?php include_once("layout/navbar.php");?>

    <?php
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'ok')
        echo '<div class="alert alert-success" role="alert">Todo salio bien</div>';
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error')
        echo '<div class="alert alert-danger" role="alert">Algo salio mal</div>';
    ?>

        <div class="container mt-5">
            <div class="row mb-5">
                <div class="offset-10 col-2">
                    <button class="btn btn-primary" id="btnAgregar"><i class='fas fa-plus'></i>Agregar</button>
                </div>
            </div>

            <div class="jumbotron bg-dark text-white container pt-2 pb-2" style="display:none" id="formulario">
                <form action="accionUsuario.php" method="post" id="formularioUsuario">
                    <h1 class="display-4 text-center">Alta Usuario</h1>
                    <input type="hidden" name="accion" value="create">
                    <label for="">nombre</label>
                    <input type="text" class="form-control" name="nombre" id="">
                    <label for="">apellido</label>
                    <input type="text" class="form-control" name="apellido" id="">
                    <label for="">email</label>
                    <input type="text" class="form-control" name="email" id="">
                    <label for="">terapia</label>

                    <select name="idDep" id="" class="form-control">
    <?php
        include_once("../conecta.php");
        $resultado = mysqli_query($conec, "select * from terapia");
        while ($fila = mysqli_fetch_array($resultado)) {
        echo "<option value='" . $fila['idTer'] . "'>" . $fila['nomTer'] . "</option>";
        }
    ?>
    </select>

                    <label for="">contraseña</label>
                    <input type="password" class="form-control" name="pass" id="">
                    <hr>
                    <input type="submit" id="Agregar" value="Agregar" class="btn btn-outline-primary">
                </form>
            </div>

            <table class="table mb-5" id="tablaUsuario">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>E-mail</th>
                        <th>Dpartamentoe</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
        require_once("../conecta.php");
        $resultado = mysqli_query
        ($conec, "SELECT idUser,nombre,apellido,email,nomTer 
        FROM usuario 
        INNER JOIN terapia ON  usuario.idTer=terapia.idTer");
        while ($fila = mysqli_fetch_array($resultado)) {
        echo "<tr>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['apellido'] . "</td>";
        echo "<td>" . $fila['email'] . "</td>";
        echo "<td>" . $fila['nomTer'] . "</td>";
        echo "<td> <button class='btn btn-danger eliminar' data-id='" 
        .$fila['idUser'] . "'><i class='fas fa-trash'></i></button> 
        <button class='btn btn-warning editar' data-toggle='modal' data-target='#staticBackdrop'  
        data-id='" . $fila['idUser'] . "'><i class='fas fa-pen' ></i></button> </td>";
        echo "</tr>";
        }
        ?>
                </tbody>
            </table>
        </div>
        <br>



        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Alta Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body" id="contenidoModal">
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.validate.min.js"></script>
        <script src="../js/datatables.min.js"></script>
        <script src="../js/all.js"></script>


        <script>
            //manda el id al modal
            $('.editar').on('click', function() {
                var idUser = $(this).data('id');
                $('#contenidoModal').load('layout/modalUsuario.php', {
                    'idUser': idUser
                });
            });
            //validacion
            $("#Agregar").on("click", function() {
                $("#formularioUsuario").validate({
                    rules: {
                        nombre: {
                            required: true,
                            maxlength: 10,
                            minlength: 3
                        },
                        email: {
                            email: true,
                        }
                    },
                    messages: {
                        nombre: {
                            required: "Pon el Nombre",
                            maxlength: "Ingrese menos de 10 caracteres",
                            minlength: "Ingrese mas de 3 caracteres"
                        },

                        email: "Debe tener el formato correo@dominio.ext"
                    },
                    errorElement: "div",
                    errorClass: "text-danger",
                    errorPlacement: function(error, element) {
                        error.insertAfter(element);
                    },
                    submitHandler: function() {
                        var usuarioNuevo = $('#formularioUsuario').serialize();

                        $.ajax({
                            method: 'POST',
                            url: 'accionUsuario.php',
                            data: usuarioNuevo,
                            success: function() {
                                //alert("ya se borro"); 
                                window.location.replace('usuario.php?mensaje=ok');
                            }
                        });
                    }
                });
            });

            //Mostrat formulario
            $('#btnAgregar').on('click', function() {
                $('#formulario').toggle('slow');
            });


            $('#tablaUsuario').dataTable();
            //esto elimina un registro
            $('.eliminar').on('click', function() {

                var elimino = 0;
                var usuario = {
                    idUser: $(this).data('id'),
                    accion: 'delete'
                }

                $.ajax({
                    method: 'POST',
                    url: 'accionUsuario.php',
                    data: usuario,
                    success: function() {
                        //alert("ya se borro"); 
                        //  window.location.replace('usuario.php');
                        elimino = 1;

                    }

                });
                $(this).parent().parent().remove();



            });
        </script>
</body>

</html>