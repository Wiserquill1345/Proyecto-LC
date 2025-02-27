<?php

//si se obtiene la id del usuario se realiza la operacion
if (isset($_GET['id'])) {
    //Hacemos conexion con la base de datos
    include "../../db_conn.php";

    //funcion para validad datos
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //validamos la id
    $id = validate($_GET['id']);

    //query para borrar al usuario en base a su id
    $sql = "DELETE FROM users
                  WHERE id=$id";

    //ejecutamos el query en la base de datos
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //si la eliminacion del usuario fue exitosa mandamos el mensaje de que la operacion fue exitosa
        header("Location: ../users.php?id=$id&exito=La cuenta se ha borrado exitosamente");
        exit();
    } else {
        //si la eliminacion del usuario no fue exitosa mandamos el mensaje de que ocurrio un error
        header("Location: ../users.php?id=$id&error=ha ocurrido un error desconocido&$user_data");
        exit();
    }
} else {
    //si no se obtiene la id mandamos al usuario al control de usuarios
    header("Location: ../users.php");
}