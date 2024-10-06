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
    
    $sql = "DELETE FROM users
                  WHERE id=$id";
        $result=mysqli_query($conn, $sql);
        if($result){
            header("Location: users.php?id=$id&exito=La cuenta se ha borrado exitosamente");
            exit();
        }else{
            header("Location: users.php?id=$id&error=ha ocurrido un error desconocido&$user_data");
            exit();
        }
}else{
    header("Location: users.php");
}