<?php

    $casa = 100;
    $usuario = 100;
    
    while($usuario > 0):
    $dado=rand(1,6);
    $opcion = readline ("¿Desea apostar? (si = seguir, no = salir)\n");

    if ($opcion == "si"){
        $num=readline("Escribe un numero de entre 1 - 6: \n");
        $apuesta=readline("¿Cuanto deseas apostar? \n");

        if($num == $dado){
        $usuario = $usuario + $apuesta;
        $casa = $casa - $apuesta;
        print("Apuesta: ". $num .", Dado: ". $dado ."\n");
        print("¡Felicidades, Gano!, Acumulo: ".$usuario. ", la casa perdio: ".$casa."\n");
    
        } else {
        $usuario = $usuario - $apuesta;
        $casa = $casa + $apuesta;
        print("Apuesta: ". $num .", Dado: ". $dado."\n");
        print("¡Oh no, Perdio!, su acumulado es:  ".$usuario. ", la casa acumulo: ".$casa."\n");
        if ($usuario<=0){
            echo"No tienes fondos suficientes para seguir apostando\n";
            echo"Resultados; \n Numero:". $num. "\n Dado:". $dado ."\n Acumulado:" .$usuario. "\n Casa:" . $casa."\n";
        }
    }

    } else{
        echo"Gracias por participar\n";
        echo"Resultados; \n Numero:". $num. "\n Dado:". $dado ."\n Acumulado:" .$usuario. "\n Casa:" . $casa."\n";
        return;
    }
endwhile;
    
    

?>
