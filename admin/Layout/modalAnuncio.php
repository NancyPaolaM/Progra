<?php
require_once("../../conecta.php");
    $resultado = mysqli_query($conec, "SELECT * from anuncios where idAnuncio=" . $_POST["idAnuncio"]);
        echo "<table>";
    while ($fila = mysqli_fetch_array($resultado)) {
      $idAnuncio=$fila['idAnuncio'];
      $titulo=$fila['titulo'];
      $anuncio=$fila['anuncio'];
      $fecha=$fila['fecha'];
      
    }
    echo "</table>";

?>
      <form action="accionAnuncios.php" method="POST" id="frmEditar">
                <h1 class="display-4 text-center">Actualiza Anuncio</h1>
                <input type="hidden" name="accion" value="update">
                <input type="hidden" name="idAnuncio" value="<?php echo$idAnuncio;?>">
                <label for="">titulo</label>
                <input type="text" class="form-control" name="titulo" id="" value="<?php echo$titulo;?>">
                <label for="">anuncio</label>
                <input type="text" class="form-control" name="anuncio" id="" value="<?php echo$anuncio;?>">
                <label for="">fecha</label>
                <input type="text" class="form-control" name="fecha" id="" value="<?php echo$fecha;?>">
                <input type="submit" id="Editar" value="Editar" class="btn btn-outline-primary">
            </form>

            <script>
            $("#Editar").on("click", function() {
    $("#frmEditar").validate({
        rules: {
            titulo:{
                required:true
            },
            
        },
        messages: {
            titulo:{
                required:"Escribe un titulo",
            },
            
        },
        errorElement: "div",
        errorClass: "text-danger",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        submitHandler: function() {
            var anuncioNuevo=$('#frmEditar').serialize();
            $.ajax({
                method: 'POST',
                url: 'accionAnuncios.php',
                data: anuncioNuevo,
                success: function() {
                window.location.replace('anuncios.php?mensaje=ok');
                }
            });
            }
            });
        });
            </script>