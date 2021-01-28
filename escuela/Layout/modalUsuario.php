<?php


require_once("../../conecta.php");
$resultado = mysqli_query($conec, "select * from usuario where idUser=" . $_POST["idUser"]);
echo "<table>";
while ($fila = mysqli_fetch_array($resultado)) {
    $UserID = $fila['idUser'];
    $nombre = $fila['nombre'];
    $apellido = $fila['apellido'];
    $email = $fila['email'];
    $idTer = $fila['idTer'];
}
echo "</table>";
?>



<form action="accionUsuario.php" method="post" id="frmEditar">

    <input type="hidden" name="accion" value="update">
    <input type="hidden" name="idUser" value="<?php echo $UserID; ?>">
    <label for="">nombre</label>
    <input type="text" class="form-control" name="nombre" id="" value="<?php echo $nombre; ?>">
    <label for="">apellido</label>
    <input type="text" class="form-control" name="apellido" id="" value="<?php echo $apellido; ?>">
    <label for="">email</label>
    <input type="text" class="form-control" name="email" id="" value="<?php echo $email; ?>">
    <label for="">terapia</label>
    <select name="idTer" id="" class="form-control">
        <?php
        include_once("../conecta.php");
        $resultado = mysqli_query($conec, "select * from terapia");

        while ($fila = mysqli_fetch_array($resultado)) {

            if ($fila['idTer'] == $idTer)

                echo "<option value='" . $fila['idTer'] . "' selected='true'>" . $fila['nomTer'] . "</option>";
            else
                echo "<option value='" . $fila['idTer'] . "'>" . $fila['nomTer'] . "</option>";
        }
        ?>
    </select>
    <label for="">contraseña</label>
    <input type="password" class="form-control" name="password" id="">
    <hr>
    <input type="submit" id="Editar" value="Editar" class="btn btn-outline-primary">
</form>

<script>
    $("#Editar").on("click", function() {
        $("#frmEditar").validate({
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
                var usuarioNuevo = $('#frmEditar').serialize();

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
</script>