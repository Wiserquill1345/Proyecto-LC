<!-- Permite la conexion entre la base de datos y la aplicacion web -->
<?php
$sname="localhost";
$uname="root";
$password="";
$db_name="ues_db";

$conn = mysqli_connect ($sname, $uname, $password, $db_name);
    // si no se realiza la conexion correctamente
if(!$conn){
    echo "Error en la conexion";
}