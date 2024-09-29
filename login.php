<?php
session_start();
//hace la conexion con la base de datos
include "db_conn.php";
// verifica si existe las variables email y password
if(isset($_POST['email']) && isset($_POST['password'])){
    
    //Se crea una funcion para validar la informacion del email y la contraseña
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //validamos el email y la contraseña
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    //si el input del email esta vacio nos regresa al login
    if(empty($email)){
        header("Location: index.php?error=Se requiere un email");
        exit();
    //si el input de la contraseña esta vacio nos regresa al login
    }else if(empty($pass)){
        header("Location: index.php?error=Se requiere una contraseña");
        exit();
    //si los inputs estan llenados, entonces procede a la verificacion de usuarios
    }else{
        
        //Se aplica hash a la contraseña
        $pass = md5($pass);

        //realizamos una solicitud a la base de datos en la tabla de usuarios
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        $result=mysqli_query($conn, $sql);

        //se verifica si existe algun usuario que cumpla con los datos enviados por el usuario
        if(mysqli_num_rows($result) ===1){
            //guardamos todos los datos del usuario en una variable
            $row = mysqli_fetch_assoc($result);
            //verificamos si los datos se guardaron de forma correcta
            if ($row['email'] === $email && $row['password'] === $pass) {
                //se guardan en las variables de sesion sus respectivos datos del usuario
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['nombre'];
                $_SESSION['id'] = $row['id'];
                //mandamos al usuario al home pagea
                header("Location: home.php");
                exit();
            }
        }else{
            //si no se encuentra a ningun usuario que coincida con los datos obtenidos entonces nos regresa al login
            header("Location: index.php?error=Usuario o contraseña incorrecta");
            exit();
        }
    }
}else{
    //si no existen nos regresan al login
    header("Location: index.php");
    exit();
}