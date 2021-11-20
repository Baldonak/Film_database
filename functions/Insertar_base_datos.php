<?php
/*
Aquest exemple serveix per veure com insertar un registre a una base de base de dades
Les dades de connexió les ha d'omplir l'usuari.
La taula té aquests camps...
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


$sql = "INSERT INTO $Tabla (titol, director, any, pais, id_genere, puntuacio) 
        VALUES (?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $Titulo, $Director, $Year, $Pais, $Genero, $Puntuacion);
     
        //dades del registre a insertar:
            $Titulo = $_POST["Titulo"];
            $Director = $_POST["Director"];
            $Year = $_POST["Year"];
            $Pais = $_POST["Pais"];
            $Genero = $_POST["Genero"];
            $Puntuacion = $_POST["Puntuacion"]; 

    $stmt->execute();

$sql_total = "SELECT * FROM $Tabla ORDER BY $Fecha_de_creacion DESC ";

    //Subimos la imagen a la carpeta

        $Resultado = $conn->query($sql_total);

        $Fila = $Resultado->fetch_assoc();
            
        $Id = $Fila["id"];

        echo $Id;

    //SUBIR IMAGEN -------------------------------------------------------------

    //Subir_archivos('../img/movie_covers', $_FILES['User_file'], $Id );
        //function Subir_archivos($directorio_destino, $nombre_fichero)

        $Ruta_temporal =  $_FILES['User_file']['tmp_name'];
        $Ruta_definitiva = "../img/movie_covers/$Id.jpg";

        echo $Ruta_definitiva;
        
        move_uploaded_file($Ruta_temporal, $Ruta_definitiva );



//executem_consulta
if ($conn->query($sql) === TRUE) { //tot ok
  echo "Ok! Registre afegit.";
} else { //error
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close(); //tanquem la connexió amb la base de dades

$nuevaURL = '../_index.php';

header('Location: '.$nuevaURL);
?>
