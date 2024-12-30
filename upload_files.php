<?php
//al hacer click en el boton de subir polizas y se haya subido un documento se realiza lo siguiente
if(isset($_POST['submit']) && isset($_FILES['my_files'])) {
    //Conexion a BD
    include "db_conn.php";

    //Guardamos el nombre del archivo
    $file_name = $_FILES['my_files']['name'];
    //Guardamos el tamaño del archivo
    $file_size = $_FILES['my_files']['size'];
    //Guardamos el nombre temporal del archivo
    $tmp_name = $_FILES['my_files']['tmp_name'];
    //Definimos si hubo un error en el archivo
    $error = $_FILES['my_files']['error'];

    //Si no hay errores en el archivo hacemos lo siguiente
    if($error ===0){
        //Si el tamaño del archivo es mayor a 10 Megabytes, se cancela la operacion
        if($file_size>10000000){
            //Mandamos el mensaje de que el archivo es muy grande y regresamos a la pagina de subir archivos
            $em= "El tamaño del archivo es muy grande";
            header("Location:upload.php?error=$em");
        }else{
            //Si el tamaño es menor a 10 Megabytes hacemos lo siguiente
            //Guardamos el nombre del archivo junto a su extensiòn
            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);
            //Transformamos la extension del archivo en minusculas
            $file_ex_lc = strtolower($file_ex);

            //Definimos las extensiones permitidas
            $allowed_exs = array("pdf", "jpg", "png");

            //Si la extension del archivo es de las permitidas se hara lo siguiente
            if(in_array($file_ex_lc,$allowed_exs)){
                //Creamos una variable que sera el nombre nuevo de la poliza
                $new_file_name = uniqid("Poliza-",true).'.'.$file_ex_lc;
                //Guardamos el path donde se guardara la poliza
                $file_upload_path = 'uploads/'.$new_file_name;
                //Guardamos el archivo en el lugar correspondiente
                move_uploaded_file($tmp_name, $file_upload_path);
            
                //Creamos una consulta para insertar la poliza en la BD
                $sql = "INSERT INTO files(file_url) 
                        VALUES('$new_file_name')";

                //Hacemos la peticion de la consulta en la BD
                mysqli_query($conn, $sql);
                //Regresamos a la lista de polizas al usuario
                header("Location: list_poliza.php");
            }else{
                //Mandamos al usuario de regreso si la poliza no es de una extension permitida
                $em = "No puedes subir archivos de este tipo";
                header("Location: upload.php?error=$em");
            }
        }
    }else{
        //Mandamos al usuario de regreso si hay algun error en el archivo
        $em = "Ocurrio un error inesperado!";
        header("Location: upload.php?error=$em");
    }
}else{
    //Mandamos al usuario de regreso si no se mando ninguna poliza
    $em = "No se recibio el archivo!";
    header("Location: upload.php?error=$em");
}