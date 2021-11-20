<?php

function Consulta_base_datos($Texto_busqueda){


        // DATOS DE CONEXIÓN

        $Servidor = "localhost";
        $Usuario =  "User_01";
        $Pass = "1234";
        $Nombre_base_de_datos = "filmoteca";
        /*$Tabla = "(SELECT * FROM `pellicules` INNER JOIN `generes` ON `pellicules`.`id_genere` = `generes`.`id`)";*/
        $Tabla = "pellicules";

        //EXPRESIÓN REGULAR

            $Array_palabras_buscadas = explode (" ", $Texto_busqueda);

            foreach ($Array_palabras_buscadas as &$valor){

                $valor = "%".$valor."%";
            }

            $Palabras_buscadas = implode ("|", $Array_palabras_buscadas);

            //Ejemplo: (\W|^)[\w.\-]{0,25}@(yahoo|hotmail|gmail)\.com(\W|$)
    
        //NUMERO TOTAL DE REGISTROS
            
            $sql_total = "SELECT 
            `pellicules`.`id`, `pellicules`.`titol`, `pellicules`.`director`, `pellicules`.`id_pais`, `countries`.`name`, `pellicules`.`any`, `pellicules`.`puntuacio` ,`id_genere`,
            `generes`.`genre_name`
            FROM `pellicules` 
            INNER JOIN `generes` ON `pellicules`.`id_genere` = `generes`.`id`
            INNER JOIN `countries` ON `pellicules`.`id_pais` = `countries`.`id`
            WHERE 
            `titol` LIKE '%$Palabras_buscadas%' OR
            `director` LIKE '%$Palabras_buscadas%' OR
            `countries`.`name` LIKE '%$Palabras_buscadas%' OR
            `any` LIKE '%$Palabras_buscadas%' OR    
            `genre_name` LIKE '%$Palabras_buscadas%'
            "; // Recuperamos todos los datos de la tabla "personas" que cumplen con el patron

            /*SELECT * FROM `pellicules` INNER JOIN `generes` ON `pellicules`.`id_genere` = `generes`.`id` */
    
        //CONEXIÓN CON LA BASE DE DATOS
    
            $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);
            $Resultado_total = $conn->query($sql_total);

        //COMPORBACIÓN DE LA CONEXIÓN
    
            if ($conn->connect_error){
    
                echo "Fallo en la conexión: ".$conn->connect_error;
                die();
            }
            else{
                echo "(Conexión con la base de datos establecida con éxito)<br><br>";
            }
    
        //NUMERO TOTAL DE REGISTROS

            $Numero_total_entradas = $Resultado_total->num_rows;
    
    $Numero_de_entradas_por_pagina = 25;

    if (!isset($_GET["valor"])){ //si el valor GET no está definido..
    $_GET["valor"] = 0; //los pongo a zero
 
    $valor_seg = 1;
        
    echo "<a href='?valor=$valor_seg' class='button'> Página siguiente >> </a>";

    }else{ //si existe...

    //echo $_GET["valor"]; //lo muestro y lo aumento en 1
    $valor_ant = $_GET["valor"]-1; //le resto 1 al anterior
    $valor_seg = $_GET["valor"]+1; //le sumo uno al siguiente

        if($_GET["valor"] !== "0"){
            echo "<br><a href='?valor=$valor_ant' class='button'> << Página anterior </a>";
        }

        $Numero_paginas_validas = ceil($Numero_total_entradas / $Numero_de_entradas_por_pagina);

        if($_GET["valor"] < $Numero_paginas_validas - 1)
        echo "<a href='?valor=$valor_seg' class='button'> Página siguiente >> </a>";
    }

    $Limite_inferior = $_GET["valor"] * $Numero_de_entradas_por_pagina;
    $Limite_superior = $Limite_inferior + $Numero_de_entradas_por_pagina;

    if($Limite_superior < $Numero_total_entradas){ 

        echo "<br><br><br>".$Limite_inferior."-".$Limite_superior." (".$Numero_total_entradas.")";

    }
    else {echo "<br><br><br>".$Limite_inferior."-".$Numero_total_entradas." (".$Numero_total_entradas.")";}

    //CONSULTA CON PATRON
    
    $sql = "SELECT 
    `pellicules`.`id`, `pellicules`.`titol`, `pellicules`.`director`, `pellicules`.`id_pais`, `countries`.`name`, `pellicules`.`any`, `pellicules`.`puntuacio` ,
    `id_genere`, `generes`.`genre_name`
    FROM `pellicules` 
        INNER JOIN `generes` ON `pellicules`.`id_genere` = `generes`.`id`
        INNER JOIN `countries` ON `pellicules`.`id_pais` = `countries`.`id`
    WHERE 
        `titol` LIKE '%$Palabras_buscadas%' OR
        `director` LIKE '%$Palabras_buscadas%' OR
        `countries`.`name` LIKE '%$Palabras_buscadas%' OR
        `any` LIKE '%$Palabras_buscadas%' OR    
        `genre_name` LIKE '%$Palabras_buscadas%'
    ORDER BY `Fecha_de_creacion` DESC LIMIT $Limite_inferior, $Numero_de_entradas_por_pagina"; // Recuperamos todos los datos de la tabla "personas"

    /*SELECT * FROM `pellicules` INNER JOIN `generes` ON `pellicules`.`id_genere` = `generes`.`id` */
    
    //CONEXIÓN CON LA BASE DE DATOS

    $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);

   
    //EJECUCIÓN DE LA CONSULTA

    $Resultado = $conn->query($sql);



    return $Resultado;
}

?>
