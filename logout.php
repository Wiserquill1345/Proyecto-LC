<!-- Eliminamos la sesion del usuario y mandamos al usuario al inicio de sesion -->
<?php
session_start();

session_unset();
session_destroy();

header("Location: index.php");