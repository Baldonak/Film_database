<?php
/*
Modificación de un registro de la base de datos

ID | NOMBRE | APELLIDOS | EDAD
*/
    include 'Subir_archivos.php';

//dades de connexió
    $Servidor = "localhost";
    $Usuario =  "User_01";
    $Pass = "1234";
    $Nombre_base_de_datos = "filmoteca";
    $Tabla = "pellicules";
    $Fecha_de_creacion = "Fecha_de_creacion";

    //fem la connexió
    $conn = new mysqli($Servidor, $Usuario, $Pass, $Nombre_base_de_datos);

    // comprovem la connexió
    if ($conn->connect_error) {
        return "Fallada en la connexió: ".$conn->connect_error;
        die();
    }

//consulta
//INSERT INTO table_pellicules (column1, column2, column3, ...) VALUES (value1, value2, value3, ...);


/*$sql = "UPDATE $Tabla SET `id_pais`= 80 WHERE `pais` = 'ALEMANYA';*/


$sql = "UPDATE $Tabla SET id_pais=? WHERE pais=?";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $Id_pais, $Pais);
     
            $Id_pais = 80;
            $Pais = "ALEMANYA";

    $stmt->execute();

            $Id_pais = 10;
            $Pais = "ARGENTINA";

    $stmt->execute();

            $Id_pais = 13;
            $Pais = "AUSTRÀLIA";

    $stmt->execute();

            $Id_pais = 27;
            $Pais = "BOSNIA-HERZEGOVINA";

    $stmt->execute();

            $Id_pais = 30;
            $Pais = "BRASIL";

    $stmt->execute();

            $Id_pais = 47;
            $Pais = "CANADÀ";

    $stmt->execute();

            $Id_pais = 53;
            $Pais = "COLÒMBIA";

    $stmt->execute();

            $Id_pais = 38;
            $Pais = "CUBA";

    $stmt->execute();

            $Id_pais = 56;
            $Pais = "DINAMARCA";

    $stmt->execute();

            $Id_pais = 202;
            $Pais = "ESPANYA";

    $stmt->execute();

            $Id_pais = 72;
            $Pais = "FRANÇA";

    $stmt->execute();

            $Id_pais = 84;
            $Pais = "GRÈCIA";

    $stmt->execute();

            $Id_pais = 155;
            $Pais = "HOLANDA";

    $stmt->execute();

            $Id_pais = 96;
            $Pais = "HONG-HONG";

    $stmt->execute();

            $Id_pais = 104;
            $Pais = "IRELAND";

    $stmt->execute();

            $Id_pais = 105;
            $Pais = "ISRAEL";

    $stmt->execute();

            $Id_pais = 106;
            $Pais = "ITÀLIA";

    $stmt->execute();

            $Id_pais = 110;
            $Pais = "JAPÓ";

    $stmt->execute();

            $Id_pais = 142;
            $Pais = "MÈXIC";

    $stmt->execute();

            $Id_pais = 165;
            $Pais = "NORUEGA";

    $stmt->execute();

            $Id_pais = 158;
            $Pais = "NOVA ZELANDA";

    $stmt->execute();

            $Id_pais = 176;
            $Pais = "POLÒNIA";

    $stmt->execute();
    


//executem_consulta
if ($conn->query($sql) === TRUE) { //tot ok
  echo "Ok! Registre afegit.";
} else { //error
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); //tanquem la connexió amb la base de dades

$nuevaURL = '../_index.php';

//header('Location: '.$nuevaURL);

?>
