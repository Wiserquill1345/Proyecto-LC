<?php
session_start();
//hace la conexion con la base de datos
include "db_conn.php";
// verifica si existe las variables email y password
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re-password'])){
    
    //Se crea una funcion para validar la informacion del email y la contraseña
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //validamos el email y la contraseña
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re-password']);

    $user_data = 'name=' . $name. '&email=' . $email;
    //si el input del email esta vacio nos regresa al login
    if(empty($name)){
        header("Location: register.php?error=Se requiere un nombre&$user_data");
        exit();
    //si el input de la contraseña esta vacio nos regresa al login
    }else if(empty($email)){
        header("Location: register.php?error=Se requiere un email&$user_data");
        exit();    
    }else if(empty($pass)){
        header("Location: register.php?error=Se requiere una contraseña&$user_data");
        exit();
    }else if(empty($re_pass)){
        header("Location: register.php?error=Se requiere volver a repetir la contraseña&$user_data");
        exit();
    }else if($re_pass !== $pass){
        header("Location: register.php?error=Las contraseñas no coinciden entre si&$user_data");
        exit();
    //si los inputs estan llenados, entonces procede a la verificacion de usuarios
    }else{
        
        $pass = md5($pass);
        //realizamos una solicitud a la base de datos en la tabla de usuarios
        $sqlsearch = "SELECT * FROM users WHERE email='$email' ";
        $resultsearch=mysqli_query($conn, $sqlsearch);

        //se verifica si existe algun usuario que cumpla con los datos enviados por el usuario
        if(mysqli_num_rows($resultsearch) > 0){
            header("Location: register.php?error=Este email ya se ha usado&$user_data");
            exit();
        }else{
            $sqlinsert = "INSERT INTO users(nombre,email,password) VALUES('$name','$email','$pass')";
            $resultinsert=mysqli_query($conn, $sqlinsert);
            if($resultinsert){
                header("Location: register.php?exito=La cuenta se ha creado exitosamente&$user_data");
                exit();
            }else{
                header("Location: register.php?error=ha ocurrido un error desconocido&$user_data");
                exit();
            }
        }
    }
}else{
    //si no existen nos regresan al login
    header("Location: index.php");
    exit();
}