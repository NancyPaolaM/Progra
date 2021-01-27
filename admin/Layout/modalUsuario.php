<?php


require_once("../../conecta.php");
    $resultado = mysqli_query($conec, "select * from usuario where userID=" . $_POST["userID"]);
        echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
      $UserID=$fila['userID'];
      $nombre=$fila['nombre'];
      $apellido=$fila['apellido'];
      $email=$fila['email'];
      $idDep=$fila['idDep'];
      
    }
    echo "</table>";
?>



<form action="accionUsuario.php" method="post" id="frmEditar">
                
                <input type="hidden" name="accion" value="update">
                <input type="hidden" name="userID" value="<?php echo$UserID; ?>">
                <label for="">nombre</label>
                <input type="text" class="form-control" name="nombre" id="" value="<?php echo$nombre; ?>">
                <label for="">apellido</label>
                <input type="text" class="form-control" name="apellido" id="" value="<?php echo$apellido; ?>">
                <label for="">email</label>
                <input type="text" class="form-control" name="email" id="" value="<?php echo$email; ?>">
                <label for="">departamento</label>
                <select name="idDep" id="" class="form-control">
                    <?php
                    include_once("../conecta.php");
                    $resultado = mysqli_query($conec, "select * from departamento");

                    while ($fila = mysqli_fetch_array($resultado)) {

                    if($fila['idDep']==$idDep)

                        echo "<option value='" .$fila['idDep']."' selected='true'>".$fila['nombreDepartamento']."</option>";
                        else
                        echo "<option value='" .$fila['idDep']."'>".$fila['nombreDepartamento']."</option>";
                    }
                    ?>
                </select>
                <label for="">contraseña</label>
                <input type="password" class="form-control" name="pass" id="">
                <hr>
                <input type="submit" id="Editar" value="Editar" class="btn btn-outline-primary">
            </form>

            <script>
              $("#Editar").on("click", function() {
    $("#frmEditar").validate({
        rules: {
            nombre:{
                required: true,
                maxlength: 10,
                minlength: 3

            },
            email: { 
                email: true,
            
        }
        },
        messages: {
            nombre:{
                required: "Pon el Nombre",
                maxlength: "Ingrese menos de 10 caracteres",
                minlength: "Ingrese mas de 3 caracteres" 
            },

email:"Debe tener el formato correo@dominio.ext"
        },
        errorElement: "div",
        errorClass: "text-danger",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function() {
            var usuarioNuevo= $('#frmEditar').serialize();

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