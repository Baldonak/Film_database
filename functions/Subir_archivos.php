<?php

/**
 * Subir_archivos()
 *
 * Sube una imagen al servidor  al directorio especificado teniendo el Atributo 'Name' del campo archivo.
 *
 * @param string $directorio_destino Directorio de destino dónde queremos dejar el archivo
 * @param string $nombre_fichero Atributo 'Name' del campo archivo
 * @return boolean
 */

function Subir_archivos($directorio_destino, $fichero, $Nuevo_nombre)
{
    $tmp_name = $fichero['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        
        $img_type = $fichero['type'];

        echo 1;
        // Si se trata de una imagen   
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
            strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            echo 2;
            if (move_uploaded_file($tmp_name, $directorio_destino.'/'.$Nuevo_nombre))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
}



?>