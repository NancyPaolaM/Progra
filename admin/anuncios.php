<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anuncios</title>
    <link rel="stylesheet" href="../css/bootstrap copy.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    
</head>
<body >

    <?php include_once("layout/navbar.php"); ?>
    <?php
if(isset ($_GET ['mensaje']) && $_GET['mensaje']=='ok' )
    echo'<div class="alert alert-success" role="alert">Todo salio bien</div>'; 
if (isset ($_GET ['mensaje']) && $_GET ['mensaje']=='error' )
    echo'<div class="alert alert-danger" role="alert">Algo salio mal</div>';    
    ?>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="offset-10 col-2">
                <button class="btn btn-primary" id="btnAgregar"><i class='fas fa-plus'></i>Agregar</button>
            </div>
        </div>
        <div class="jumbotron bg-dark text-white container pt-2 pb-2" style="display:none" id="formulario">
            <form action="accionAnuncios.php" method="POST" id="formularioAnuncio">
                <h1 class="display-4 text-center">Publicar Anuncio</h1>
                <input type="hidden" name="accion" value="create">
                <label for="">id</label>
                <input type="text" class="form-control" name="idAnuncio" id="">
                <label for="">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="">
                <label for="">Anuncio</label>
                <input type="text" class="form-control" name="anuncio" id="">
                <label for="">Fecha</label>
                <input type="date"class="form-control" name="fecha" id="">
                <label for="">Usuario que lo publica</label>
                <select name="userID" id="" class="form-control">
                    <?php
                    include_once("../conecta.php");
                    $resultado = mysqli_query($conec, "SELECT * from usuario");
                while ($fila = mysqli_fetch_array($resultado)) {
                    echo"<option value='".$fila['userID']."'>".$fila['nombre']."</option>";
                         }                 
                    ?>
                </select>
                
               <hr>
                <input type="submit" id="Agregar" value="Agregar" class="btn btn-outline-primary">
            </form>
        </div>
        <table class="table mb-5" id="tablaAnuncio">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Anuncio</th>
                <th>Fecha</th>
                <th>Usuario que lo publica</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php 
        require_once("../conecta.php");
        $resultado=mysqli_query($conec,"SELECT idAnuncio,titulo,anuncio,fecha,nombre FROM anuncios INNER JOIN usuario ON anuncios.userID=usuario.userID");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                echo"<td>".$fila['titulo']."</td>";
                echo"<td>".$fila['anuncio']."</td>";
                echo"<td>".$fila['fecha']."</td>";
                echo"<td>".$fila['nombre']."</td>";
                echo"<td><button class='btn btn-danger eliminar' data-id='".$fila['idAnuncio']."'><i class='fas fa-trash'></i></button> <button class='btn btn-warning editar' data-toggle='modal' data-target='#staticBackdrop' data-id='".$fila['idAnuncio']."' ><i class='fas fa-pen'></i></button></td>";
            echo"</tr>";
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
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contenidoModal">
      </div>
    </div>
  </div>
</div>
    <script src="../js/jquery-3.1.1.js"></script>
    <!-- <script src="../js/jquery-3.5.1.min.js"></script> -->
    <script src="../js/bootstrap.bundle.min.js"></script>
 
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>

    <script src="../js/all.js"></script>
    <script>

$('.editar').on('click',function(){
var idAnuncio=$(this).data('id');
$('#contenidoModal').load('layout/modalAnuncio.php',{'idAnuncio':idAnuncio});
});
// validacion
$("#Agregar").on("click", function() {
    $("#formularioAnuncio").validate({
        
        rules: {
             nombre:{
              
                required:true,
                maxlength:10,
                minlength:3
            },
            email:{
                email:true,
            }
        },
        messages: {
            nombre:{
                required:"Escribe un nombre",
                maxlength:"Ingrese menos de 10 digitos",
                minlength:"Ingrese al menos 3 digitos"
            },
            email:{
                email:"Debe tener el formato correo@dominio.ext",
            }
        },
        
        errorElement: "div",
        
        errorClass: "text-danger",
        
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        
        submitHandler: function() {
            var aN=$('#formularioAnuncio').serialize();
            $.ajax({
                method: 'POST',
                url: 'accionAnuncios.php',
                data: aN,
                success: function() {
                    window.location.replace('anuncios.php?mensaje=ok');
                }
            });

        }
    });
});
        
        $('#btnAgregar').on('click',function(){
                $('#formulario').toggle('slow');
        });
                $('#tablaAnuncio').dataTable();
        
        $('.eliminar').on('click', function() {
            var elimino=0;
            var anuncio = {
                idAnuncio: $(this).data('id'),
                accion: 'delete'
            }
            
            $.ajax({
                //   parametros de entrada
                method: 'POST',
                url: 'accionAnuncios.php',
                data: anuncio,
                success: function() {
                    // window.location.replace('usuario.php');
                    elimino=1;
                }
            });
            $(this).parent().parent().remove();
        });
    </script>
</body>
</html>
