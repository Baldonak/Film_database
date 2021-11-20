<?php

function Consulta_base_datos(){

    $sql = "SELECT * FROM $Tabla";

    $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);


    if (!isset($_GET["valor"])){ //si el valor GET no está definido..
    $_GET["valor"] = 0; //los pongo a zero
    $valor_ant = 0;
    $valor_seg = 0;
    
    echo "<a href='?valor=$valor_seg'> Página siguiente >> </a>";
    }else{ //si existe...
    echo $_GET["valor"]; //lo muestro y lo aumento en 1
    $valor_ant = $_GET["valor"]-1; //le resto 1 al anterior
    $valor_seg = $_GET["valor"]+1; //le sumo uno al siguiente

    echo "<br><a href='?valor=$valor_ant'> << Página anterior |</a>";
    echo "<a href='?valor=$valor_seg'> Página siguiente >> </a>";
    }



    return True;
}
