<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-center">Registro de Usuario</h5>
        </div>
        <div class="modal-body">
            <form method="post" id="formularioInsertar">
                <div class="col-sm-12">
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre:</label>
                        <input type="text" class="col-sm-8 form-control" name="nombre" id="nombre">
                    </div>
                    <div class="row mb-3">
                        <label for="apellido" class="col-sm-4 col-form-label">Apellido:</label>
                        <input type="text" class="col-sm-8 form-control" name="apellido" id="apellido">
                    </div>
                    <div class="row mb-3">
                        <label for="correo" class="col-sm-4 col-form-label">Correo Electrónico:</label>
                        <input type="correo" class="col-sm-8 form-control" name="correo" id="correo">
                    </div>
                    <div class="row mb-3">
                        <label for="pass" class="col-sm-4 col-form-label">Contraseña:</label>
                        <input type="password" class="col-sm-8 form-control" name="pass" id="pass">
                    </div>
                </div>
                <div class="col-sm-12 text-right">
                    <input type="submit" class="btn btn-success" id="loginn" value="Registrar">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#loginn').on('click', function() {
        $('#formularioInsertar').validate({
            rules: {
                nombre: {
                    required: true,
                },
                apellido: {
                    required: true,
                },
                correo: {
                    required: true,
                    email: true,
                },
                pass: {
                    required: true,
                }
            },
            messages: {
                nombre: {
                    required: "Campo requerido",
                },
                apellido: {
                    required: "Campo requerido",
                },
                correo: {
                    required: "Campo requerido",
                    email: "Debe tener el formato correo@Dominio.ext",
                },
                pass: {
                    required: "Campo requerido",
                }
            },
            errorElement: "div",
            errorClass: "text-danger",
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            submitHandler: function() {
                var nuevoLogin = $('#formularioInsertar').serialize();
                $.ajax({
                    method: "POST",
                    url: "accionUsuarioInsertar.php",
                    data: nuevoLogin,
                    success: function() {
                        window.location.replace("index.php");
                    }
                })
            }
        });
    });
</script>