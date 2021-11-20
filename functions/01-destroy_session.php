<?php
    /*SESIONES*/ 

    session_start();                                                        //Abrimos o recuperamos una sesión existente

    if (session_id() != null and isset($_SESSION["contador"])){ 

        echo "ID: ".session_id()."<br>";                                    //Mostrar la id de la sesión
        echo "El comptador s'ha quedat a: ".$_SESSION["contador"]."<br>";   //Mostrar el contador.
        echo "Tanco la sessió..."."<br>";                                   //Informar que se va ha cerrar la sesión.

        if (session_destroy() == true){

            echo "Sesión cerrada correctamente.";                           //Informar al usuario.
        }
        else{

            echo "No se ha podido cerrar la sesión correctamente";          //Informar que no se pudo cerrar sesión.
        }
    }
    else{                                                                   //Informar si no se ha iniciado sessión

        echo "No hay ninguna sesión iniciada. Primero inicia sesión";
    }

    header ("Location: ../_index.php"); //Nos sirve para redireccionar al archivo.
    exit();


    
?>