<?php //require_once("seguridad.php");?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensajes</title>
  <link rel="stylesheet" href="../css/bootstrap copy.css">
</head>

<body class>
<?php include_once("layout/navbar.php");?>

<?php
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'ok')
        echo '<div class="alert alert-success" role="alert">Todo salio bien</div>';
    if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error')
        echo '<div class="alert alert-danger" role="alert">Algo salio mal</div>';
    ?>
  
  <div class>
    
  <div class="jumbotron  bg- text-dark ">
    
    <form action="accionMensaje.php" method="POST" id="formularioMensajes">
      <input type="hidden" name="accion" value="create">
      <h1 class="display-4 text-danger text-center">Mensajes</h1>
      <br>
      <hr>
      <label class="text-danger"><i></i>Cuentanos tu duda</label>
      <textarea class="form-control" name="texto"> </textarea>
      <label class="text-danger"></i >Tu nombre </label>
      <input type="text"  class="form-control  " name="nombre " >
      <label class="text-danger"></i> Tu Correo:</label>
      <input type="email" class="form-control" name="email">
      <label class="text-danger"></i> Departamento a contactar</label>
      <select name='idDep' id='' class='form-control'>";
          
        <?php
       
        require_once("../conecta.php");
        $resultado = mysqli_query($conec, "select * from departamento");
        while ($fila = mysqli_fetch_array($resultado)) {
        echo "<option value='" . $fila['idDep'] . "'>" . $fila['nombreDepartamento'] . "</option>";
        }
        ?>
      </select>
      <label class="text-danger"></i >STATUS </label>
      <input type="text"  class="form-control "placeholder="activo" name="STATUS">
      
      <br>
      <input type="submit" value="enviar mensaje a departamento" class="btn btn-outline-primary" id="Enviar">
    </form>
    
  </div>

  <script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
  <script src="../js/all.js"></script>

  <script>
    
    $('#Enviar').on('click', function() {
     
      $('#formularioMensajes').validate({
       
        rules: {
          nombre: {
            required: true,
            maxlength: 35,
            minlength: 3
          },
          email: {
            email: true,
            required: true,
          },
          texto: {
            required: true,
            maxlength: 300,
            minlength: 5
          },
        },
        
        messages: {
          nombre: {
            required: "*Este campo es obligatorio.",
            maxlength: "*Ingrese menos de 35 caracteres.",
            minlength: "*Ingrese mas de 3 caracteres."
          },
          email: {
            email: "*Debe tener el formato correo@Dominio.ext",
            required: "*Este campo es obligatorio."
          },
          texto: {
            required: "*Este campo es obligatorio.",
            minlength: "*Ingrese mas de 5 caracteres.",
            maxlength: "*El mensaje tiene que ser menor de 300 caracteres"
          },

        },
        errorElement: "div",
        errorClass: "text-danger",
        errorPlacement: function(error, element) {
          error.insertAfter(element);
        },

        submitHandler: function() {
          var usuarioNuevo = $('#formularioMensajes').serialize();
          $.ajax({
            method: 'POST',
            url: 'accionMensaje.php',
            data: mensajeNuevo,
            success: function() {
              window.location.replace('accionMensajes.php');
            }
          })
        }

      });
    });
  </script>

</body>

</html>