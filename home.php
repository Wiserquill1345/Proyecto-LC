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
    
    <div class="Welcome">
        <div>
            <img src="img/logo_welcome.png" alt="logo ues">
        </div>
        <div class="texts">
            <h1>Portal personal</h1>
        </div>
        <div class="texts t-right">
            <!-- Muestra el nombre del usuario -->
            <h1>Bienvenido, <?php echo $_SESSION['name']; ?></h1>}
            <!-- Cierra la sesion del usuario -->
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <!-- Botones -->
    <nav>
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="register.php">Add User</a></li>
        </ul>
        <div class="search">
            <form>
                <input type="text" placeholder="Search">
                <button type="submit" class="btn btn-light">Search</button>
            </form>
        </div>
    </nav>

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