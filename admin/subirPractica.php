    <?php
     require_once('seguridad.php');
     
 //Se obtiene la accion con el valor en el formulario.
     $accion = $_POST["accion"];
     echo $accion;
     switch ($accion) {
         
        case "Agregar":
            agregar();
            break;

        case "readAll":
            leerTodo();
            break;

        case "update":
            actualizar();
            break;
            
        case "delete":
            borrar();
            break;      

        default:
            echo "esta opcion no esta disponible";
        break;
    }

    //funcion que agregara a los usuarios.
    function agregar()
    {
        require_once("../php/coneccion.php ");
          $nombre = $_POST['nombre'];
          $apellido = $_POST['apellido'];
          $correo = $_POST['email'];
          $pass = $_POST['pass'];
          $idDep = $_POST['idDep'];
        if (mysqli_query($con, "INSERT INTO alumnos_registro(nombre,apellido,correo,pass,idDep) VALUES ('$nombre','$apellido','$correo','$pass','$idDep')")) 
        {
         header("location:usuario.php");
        } else {
         echo "<h2 class='h1'>Error </h2>";
        }
    }

    //funcion que actualizara los datos de los usuarios.
    function actualizar()
    {
        require_once('../php/coneccion.php');
        
        echo$_POST['userID'];
        echo$nombre = $_POST['nombre'];
        echo$apellido = $_POST['apellido'];
        echo$email = $_POST['email'];
        echo$pass = $_POST['pass'];
        echo$idDep = $_POST['idDep'];
       if( mysqli_query($con, "UPDATE alumnos_registro SET nombre='$nombre',apellido='$apellido',correo='$email',pass='$pass',idDep=$idDep WHERE ID=".$_POST['userID']))
       echo"ok";
       else
       echo"no";

    }
    
    //funcion que mostrara a todos los usuarios.
    function leerTodo()
    {
        require_once("../php/coneccion.php.php");
        $resultado = mysqli_query($con, "SELECT * FROM alumnos_registro");
        echo "<table  class='table table-bordered table-dark'>";
         echo "<tr>";
            echo"<td>"; echo "nombre"; echo "</td>";
              echo"<td>"; echo"apellido"; echo"</td>";
              echo"<td>"; echo"correo";  echo"</td>";
              echo"<td>"; echo"pass"; echo"</td>";
             echo"<td>";  echo"idDep"; echo"</td>";
        echo"</tr>";

        while ($fila = mysqli_fetch_array($resultado)) {
            echo "<tr>";
               echo "<td  class='bg-primary'>"; echo "".$fila['nombre']; echo "</td>";
               echo "<td  class='bg-primary'>"; echo "".$fila['apellido']; echo "</td>";
               echo "<td  class='bg-primary'>"; echo "".$fila['correo']; echo "</td>";
               echo "<td  class='bg-primary'>"; echo "".$fila['pass']; echo "</td>";
               echo "<td  class='bg-primary'>"; echo "".$fila['idDep']; echo "</td>";
               echo "<td  class='bg-primary'>"; echo "".$fila['checkbox']; echo "</td>";
            echo"</tr>";      
        }
        echo "</table>";   
    }
    function borrar()
    {
          require_once('../php/coneccion.php');
         if (mysqli_query($con, "DELETE FROM alumnos_registro where ID=". $_POST['ID']))
             echo "ok";
         else
             echo "no se pudo realizar la consulta";
    }
       
 // function leer()
 // {
 //     require_once('coneccion.php');
 //     mysqli_query($con, "SELECT * FROM alumnos_registro where ID=" . $_POST['ID']);
 // }

    ?>