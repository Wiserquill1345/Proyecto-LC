<?php

//si se obtiene la id del documento se realiza la operacion
if (isset($_GET['id'])) {
    //Hacemos conexion con la base de datos
    include "db_conn.php";

    //funcion para validad datos
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //validamos la id y el nombre del archivo del documento
    $id = validate($_GET['id']);
    $p = validate($_GET['path']);

    //guardamos la ruta del archivo
    $path = "uploads/$p";

    //query para borrar al documento en base a su id
    $sql = "DELETE FROM files
                  WHERE id=$id";

    //ejecutamos el query en la base de datos
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //si se elimino con exito el documento en la base de datos
        if(!unlink($path)) {
            //si la eliminacion del documento en su ruta no fue exitosa mandamos el mensaje de que ocurrio un error
            header("Location: list_poliza.php?id=$id&error=ha ocurrido un error desconocido");
            exit();
         }else{
             //si la eliminacion del documento en su ruta fue exitosa mandamos un mensaje de confirmación
            header("Location: list_poliza.php?id=$id&exito=El documento se ha borrado exitosamente");
            exit();
        }
    } else {
        //si la eliminacion del documento en la BD no fue exitosa mandamos el mensaje de que ocurrio un error
        header("Location: list_poliza.php?id=$id&error=ha ocurrido un error desconocido");
        exit();
    }
} else {
    //si no se obtiene la id mandamos al usuario al control de polizas
    header("Location: ../list_poliza.php");
}