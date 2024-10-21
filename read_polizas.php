<?php
//realizamos la conexion con la base de datos
include "db_conn.php";

//query en donde obtenemos los registros de todos los usuarios en la base de datos en el orden descendiente en base a los nombres
$sql = "SELECT * FROM files ORDER BY id DESC";
//ejecutamos el query en la base de datos
$result = mysqli_query($conn, $sql);