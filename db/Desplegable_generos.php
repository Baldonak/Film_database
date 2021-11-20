<?php

function Desplegable_generos(){
        // DATOS DE CONEXIÓN

        $Servidor = "localhost";
        $Usuario =  "User_01";
        $Pass = "1234";
        $Nombre_base_de_datos = "filmoteca";
        $Tabla = "generes";
            
            $sql = "SELECT `id`, `genre_name` FROM $Tabla"; 
    
        //CONEXIÓN CON LA BASE DE DATOS
    
            $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);
            $Resultado = $conn->query($sql);

        //COMPORBACIÓN DE LA CONEXIÓN
    
            if ($conn->connect_error){
    
                echo "Fallo en la conexión: ".$conn->connect_error;
                die();
            }
            else{
                echo "(Conexión con la base de datos establecida con éxito)<br><br>";
            }

   
    return $Resultado;
}






?>