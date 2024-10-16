<?php

if(isset($_POST['submit']) && isset($_FILES['my_files'])) {
    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_files']);
    echo "<pre>";

    $file_name = $_FILES['my_files']['name'];
    $file_size = $_FILES['my_files']['size'];
    $tmp_name = $_FILES['my_files']['tmp_name'];
    $error = $_FILES['my_files']['error'];

    if($error ===0){
        if($file_size>1250000){
            $em= "El tamaño del archivo es muy grande";
            header("Location:upload.php?error=$em");
        }else{
            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);

            $allowed_exs = array("pdf", "jpg", "png");

            if(in_array($file_ex_lc,$allowed_exs)){
                $new_file_name = uniqid("Poliza-",true).'.'.$file_ex_lc;
                $file_upload_path = 'uploads/'.$new_file_name;
                move_uploaded_file($tmp_name, $file_upload_path);
            
                $sql = "INSERT INTO files(file_url) 
                        VALUES('$new_file_name')";
                mysqli_query($conn, $sql);
                header("Location: files.php");
            }else{
                $em = "No puedes subir archivos de este tipo";
                header("Location: upload.php?error=$em");
            }
        }
    }else{
        $em = "Ocurrio un error inesperado!";
        header("Location: upload.php?error=$em");
    }
}else{
    header("Location: upload.php");
}