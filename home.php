<?php
//Inicio la sesion o reanuda la que ya exista
session_start();
    //Si se inicio sesion de forma exitosa nos muestra la pagina de home
if(isset($_SESSION['id']) && isset($_SESSION['email'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
<div class="Welcome d-flex justify-content-between">
    <div class="texts d-flex align-items-center">
        <img src="img/Logo_setues.png" alt="logo ues" class="logo">
        <h1>Portal personal</h1>
    </div>
    <div class="texts d-flex align-items-end flex-column pr-5">
        <!-- Muestra el nombre del usuario -->
        <h1>Bienvenid@, <?php echo $_SESSION['name']; ?></h1>
        <!-- Cierra la sesion del usuario -->
        <div class="links ">
            <a class="text-decoration-none text-white pr-5" href="logout.php">Perfil</a>
            <a class="text-decoration-none text-white pr-4" href="logout.php">Cerrar Sesion</a>
        </div>
    </div>
</div>
    <!-- menu para mostrar los elementos que tendra el menu, con listas -->
    <nav>
        <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="">Servicios</a>
                <ul>
                    <?php
                        if($_SESSION['id']==5) {
                    ?>
                        <li><a class="sublista" href="users.php">Control de usuarios</a></li>
                    <?php
                        }
                    ?>                    
                  <li><a class="sublista" href="users.php">---</a></li>
                </ul>
            </li>
        </ul>
        
        <!-- Crea un boton para el admin con la funcion de crear nuevos usuarios -->
    </nav>

    <div class="container_logo">
        <img src="img/Logo_desemfoque.png" alt="Logo_ues">
    </div>
    <script src="script.js"></script>
</body>

<footer>
</footer>

</html>
<?php
}else{ 
    //si no se encuentra al usuario o la contraseña es incorrecta nos regresa al login
    header("Location: index.php");
    exit();
}
?>