<?php
//realizamos la conexion con la base de datos
include "db_conn.php";

//query en donde obtenemos los registros de todos los usuarios en la base de datos en el orden descendiente en base a los nombres
if(isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
}
else{
    $nombre = '';
}
$sql = "SELECT * FROM files WHERE file_url LIKE '$nombre%' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);