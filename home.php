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
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    
    <div class="Welcome">
        <div>
            <img src="img/Logo_setues.png" alt="logo ues" class="logo">
        </div>
        <div class="texts">
            <h1>Portal personal</h1>
        </div>
        <div class="texts t-right">
            <!-- Muestra el nombre del usuario -->
            <h1>Bienvenid@, <?php echo $_SESSION['name']; ?></h1>
            <!-- Cierra la sesion del usuario -->
            <a href="logout.php">Logout</a>
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
                        <li><a href="register.php">Registros</a></li>
                    <?php
                        }
                    ?>
                    <li><a href="">submenu2</a></li>
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