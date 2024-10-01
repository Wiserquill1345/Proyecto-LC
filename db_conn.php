<!-- Permite la conexion entre la base de datos y la aplicacion web -->
<?php
$sname="localhost";
$uname="root";
$password="";
$db_name="ues_db";

$conn = mysqli_connect ($sname, $uname, $password, $db_name);
    // si los datos proporcionados corresponden a la base de datos elegida entonces se realiza la conexion
if(!$conn){
    echo "Conexion completa";
}