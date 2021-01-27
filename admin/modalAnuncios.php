<?php
//incluimos la seguridad de inicio de sesion
require_once('seguridad.php');
//Hacemos la consulta que va a traer un barrido de la base de datos para agregarla a las variables de los inputs del formulario.
require_once('../php/coneccion.php');
$resultado = mysqli_query($con, "SELECT * FROM anuncios where idAnuncio=" . $_POST['anuncioID']);
while ($fila = mysqli_fetch_array($resultado)) {
    $anuncioID = $fila['idAnuncio'];
    $titulo = $fila['titulo'];
    $anuncio = $fila['anuncio'];;
}
?>
<!--formulario que mandaremos al archivo accionAnuncios.php-->
<form action='accionAnuncios.php' method="POST" id='formularioActualizar'>
    <input type="hidden" name="accion" value="update">
    <input type="hidden" name="anuncioID" value="<?php echo $anuncioID ?>">
    <h1 class='display-4 text-center'>Actualizar Anuncio</h1>
    <label for=''>Titulo</label>
    <input type='text' class='form-control' name='titulo' id='' value="<?php echo $titulo; ?>">
    <label for=''>Anuncio</label>
    <input type='text' class='form-control' name='anuncio' id='' value="<?php echo $anuncio; ?>">
    <br>
    <!--Boton de enviar formulario-->
    <input type='submit' value="Actualizar" id='Editar' class='btn btn-primary border' style='margin-left:43%'>
</form>

<!--Iniciamos el script con las validaciones de jQuery-->
<script>
    $('#Editar').on('click', function() {
        //ID del formAction. 
        $('#formularioActualizar').validate({
            //reglas que pedimos que se cumplan en los campos.
            rules: {
                titulo: {
                    required: true,
                    minlength: 3
                },
                anuncio: {
                    required: true,
                    minlength: 3
                },

            },
            //avisos que se mostraran en pantalla en caso de que no se cumplan las reglas.
            messages: {
                titulo: {
                    required: "*Este campo es obligatorio.",
                    maxlength: "*Ingrese menos de 20 caracteres.",
                    minlength: "*Ingrese mas de 3 caracteres."
                },
                anuncio: {
                    required: "*Este campo es obligatorio.",
                    maxlength: "*Ingrese menos de 20 caracteres.",
                    minlength: "*Ingrese mas de 3 caracteres."
                },
            },
            errorElement: "div",
            errorClass: "text-danger",
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },

            submitHandler: function() {
                var usuarioNuevo = $('#formularioActualizar').serialize();
                $.ajax({
                    method: 'POST',
                    url: 'accionAnuncios.php',
                    data: usuarioNuevo,
                    success: function() {
                        window.location.replace('anuncios.php');
                    }
                })
            }
        });
    });
</script>