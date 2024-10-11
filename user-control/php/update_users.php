<?php

//si se obtiene la id del usuario se realiza la operacion
if (isset($_GET['id'])) {
    //Hacemos conexion con la base de datos
    include "../db_conn.php";

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

    //query para seleccionar los datos de los usuarios en base a su id
    $sql = "SELECT * FROM users WHERE id=$id";
    //ejecutamos el query en la base de datos
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
         //si se obtienen datos entonces se guardan para ser registrados y ahorrar trabajo para el que actualice a los usuarios
        $row = mysqli_fetch_assoc($result);
    } else {
        //si no se obtienen datos se les envia al control de usuarios
        header("Location: ../users.php");
    }

//al guardarse la informacion del formulario dentro del update y presionar su boton entonces realizamos la siguiente operacion
} else if (isset($_POST['update'])) {
    //hacemos la conexion con la base de datos
    include "../../db_conn.php";

    //creamos una funcion para validar los datos
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //validamos los datos del usuario
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $id = validate($_POST['id']);
    
    //si el campo del nombre esta vacio, se envia al usuario al control de usuarios junto a su respectivo mensaje de error
    if (empty($name)) {
        header("Location: ../update.php?id=$id&error=Se requiere un nombre");
    //si el campo del email esta vacio, se envia al usuario al control de usuarios junto a su respectivo mensaje de error
    } else if (empty($email)) {
        header("Location: ../update.php?id=$id&error=Se requiere un email");
    //si el campo de la contraseña esta vacio, se envia al usuario al control de usuarios junto a su respectivo mensaje de error
    } else if (empty($pass)) {
        header("Location: ../update.php?id=$id&error=Se requiere una contraseña");
    //si todos los campos estan completos se realiza la siguiente operacion
    } else {
        //se le agrega hashing a la contraseña
        $pass = md5($pass);
        //se realiza un query para actualizar a los usuarios en su nombre, email y contraseña en base a su id
        $sqlupdate = "UPDATE users
                      SET nombre='$name', email='$email', password='$password'
                      WHERE id=$id ";
        //se realiza la ejecución del query en la base de datos
        $resultupdate = mysqli_query($conn, $sqlupdate);
        //si la operacion es exitosa entonces se le manda al usuario al control de usuario con un mensaje de exito
        if ($resultupdate) {
            header("Location: ../users.php?id=$id&exito=La cuenta se ha actualizado exitosamente&$user_data");
            exit();
        //si la operacion es fallida entonces se le manda al usuario al control de usuario con un mensaje de error
        } else {
            header("Location: ../users.php?id=$id&error=ha ocurrido un error desconocido&$user_data");
            exit();
        }
    }
} else {
    //si hay un error entonces se manda al usuario al control de usuario
    header("Location: ../users.php");
}