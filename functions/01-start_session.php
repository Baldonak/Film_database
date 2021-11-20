<?php
    /*SESIONES*/ 

    session_start(); //Abrimos o recuperamos una sesión existente

    if (!isset($_SESSION["contador"])) { //si no está creada la variable de sesión comptador, la creo con valor 0

        $_SESSION["contador"] = 0;

    } else { // si ya existe...

        $_SESSION["contador"]++; //le sumo 1

    }

        $_SESSION["Texto_busqueda"] = $_POST["Texto_busqueda"];


    echo $_SESSION["Texto_busqueda"];

    header ("Location: ../_index.php"); //Nos sirve para redireccionar al archivo.
    exit();

  
?>