<?php

function pelliculas_list($Texto_busqueda){

    //EJECUCIÓN DE LA CONSULTA

        $Resultado = Consulta_base_datos($Texto_busqueda);

    //IMPRIMIR EL RESULTADO

        if ($Resultado->num_rows > 0) { 

            echo "<section class='container'>";

            while($fila = $Resultado->fetch_assoc()) {
                echo "<article class='film_container'>";
                        $Titulo = $fila["titol"];
                        echo "<p id='Titulo'>".$Titulo."</p><br>";
                        $Director = $fila["director"];
                        echo $Director."<br>";
                        $Year = $fila["any"];
                        echo $Year."<br>";
                        $Pais = $fila["name"];
                        $Id_pais = $fila["id_pais"];
                        echo $Pais."<br>";
                            echo "<img src='"; //imagen
                                $Id = $fila["id"]; /*----------------------------------------------------------------------------*/
                                $path_imagen = "img/movie_covers/".$Id.".jpg";
                                
                                if((file_exists($path_imagen))){

                                    echo $path_imagen;
                                }
                                else {echo "img/movie_covers/0.jpg";}

                            echo "' width='150'  height='200'><br>";
                            
                        // Genero

                            $Genero = $fila["genre_name"];
                            $Genero_id = $fila["id_genere"];
                            echo $Genero."<br>";

                        // puntuación

                            $Puntuacion = $fila["puntuacio"];
                            $puntuación_base_5 =($Puntuacion)/2;

                            $numero_estrellas_100 = intval($puntuación_base_5);

                            if(is_float($puntuación_base_5)){

                                $numero_estrellas_50 = 1;
                            }
                            else{$numero_estrellas_50 = 0;}

                            $numero_estrellas_0 = 5 - $numero_estrellas_100 - $numero_estrellas_50;

                            for ($i=0; $i < $numero_estrellas_100; $i++)
                            {
                                echo "<img src='img/Estrella_100.png'>";
                            }
                            for ($j=0; $j < $numero_estrellas_50; $j++)
                            {
                                echo "<img src='img/Estrella_50.png'>";
                            }
                            for ($x=0; $x < $numero_estrellas_0; $x++)
                            {
                                echo "<img src='img/Estrella_0.png'>";
                            }

                         // Más info
                            $Titulo = $fila["titol"];
                            $Palabras_titulo = explode (" ",$Titulo);
                            $Director = $fila["director"];
                            $Palabras_director = explode (" ",$Director);
                            $Palabras_titulo_mas_director = array_merge($Palabras_titulo, $Palabras_director);

                            echo "<br><a href='https://www.google.com/search?q=";

                                for ($i=0; $i<count($Palabras_titulo_mas_director); $i++){
                                    echo $Palabras_titulo_mas_director[$i]."+";
                                }
                                echo "' target='blanck'>Más info</a>";

                            echo "<br><br><a href='url/Updated_database_entry.php?
                            Id=$Id&Titulo=$Titulo&Director=$Director&Year=$Year&Id_pais=$Id_pais&Pais=$Pais&Genero_id=$Genero_id&Genero=$Genero&Puntuacion=$Puntuacion'
                            class='button' target='blanck'>Editar</a> ";

                            echo "<br><br><a href='url/Eliminar_database_entry.php?
                            Id=$Id' id='Icon_delete' target='blanck'><img src='img/Delete.png' alt='Eliminar' /></a>";

                        
                            
                echo "</article>";
            
            }
            echo "</section>";
            

        }else{
            echo "No hi ha resultats...";
        }
    
}
?>