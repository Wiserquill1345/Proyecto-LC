<?php
//Inicio la sesion o reanuda la que ya exista
session_start();
//Si se inicio sesion de forma exitosa nos muestra la pagina de home
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Cabeza del documento -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/Styles.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/normalize.css">
    </head>

    <!-- Cuerpo del documento -->
    <body>
        <!-- Barra superior -->
        <div class="Welcome d-flex justify-content-between">
            <!-- Logo y nombre del documento -->
            <div class="texts d-flex align-items-center">
                <img src="img/Logo_setues.png" alt="logo ues" class="logo">
                <h1>Portal personal</h1>
            </div>

            <div class="texts t2 d-flex align-items-end flex-column pr-5">
                <!-- Muestra el nombre del usuario -->
                <h1>Bienvenid@, <?php echo $_SESSION['name']; ?></h1>

                <div class="links ">
                    <!-- link al perfil del usuario -->
                    <a class="text-decoration-none text-white pr-5" href="logout.php">Perfil</a>
                    <!-- Cierra la sesion del usuario -->
                    <a class="text-decoration-none text-white pr-4" href="logout.php">Cerrar Sesion</a>
                </div>
            
            </div>
        </div>
        <!-- menu para mostrar los elementos que tendra el menu, con listas -->
        <nav>
            <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
            <ul class="menu">
                <!-- link al Inicio -->
                <li><a href="home.php">Home</a></li>
                <!-- boton para desplegar los servicios del portal -->
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a class="sublista" href="upload.php">Subida de polizas</a></li>
                        <li><a class="sublista" href="list_poliza.php">Control de polizas</a></li>
                        <li><a class="sublista" href="registerEmployee.php">Control de profesores</a></li>
                    </ul>
                </li>
                <?php
                    if ($_SESSION['id'] == 5) {
                ?>
                <li><a href="">Control de usuarios</a>
                    <ul>
                        <li><a class="sublista" href="user-control/users.php">Lista de usuarios</a></li>
                        <li><a class="sublista" href="user-control/create.php">Alta de usuarios</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
        </nav>
        <div class="container_logo">
        </div>
    </body>

    <footer>
    </footer>

    </html>
    <?php
} else {
    //si no se encuentra al usuario o la contraseña es incorrecta nos regresa al login
    header("Location: index.php");
    exit();
}
?>