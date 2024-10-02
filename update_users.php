<?php

if(isset($_GET['id'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //validamos el email y la contraseña
    $id = validate($_GET['id']);
    
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: users.php");  
    }
}else if(isset($_POST['update'])){
    include "db_conn.php";
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
    $id = validate($_POST['id']);

    if(empty($name)){
        header("Location: update.php?id=$id&error=Se requiere un nombre");
        //si el input de la contraseña esta vacio nos regresa al login
    }else if(empty($email)){
        header("Location: update.php?id=$id&error=Se requiere un email");
    }else if(empty($pass)){
        header("Location: update.php?id=$id&error=Se requiere una contraseña");
    }else{ 
        $pass = md5($pass);
        $sqlupdate = "UPDATE users
                      SET nombre='$name', email='$email', password='$password'
                      WHERE id=$id ";
        $resultupdate=mysqli_query($conn, $sqlupdate);
        if($resultupdate){
            header("Location: users.php?id=$id&exito=La cuenta se ha actualizado exitosamente&$user_data");
            exit();
        }else{
            header("Location: users.php?id=$id&error=ha ocurrido un error desconocido&$user_data");
            exit();
        }
    }
}else{
    header("Location: users.php");
}