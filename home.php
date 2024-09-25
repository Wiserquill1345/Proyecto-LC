<?php
session_start();
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
            <h1>Bienvenido, <?php echo $_SESSION['name']; ?></h1>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <nav class="navigator">
        <button class="btn btn-light">Inicio</button>
        <button class="btn btn-light">Inventario</button>
        <button class="btn btn-light">Pedidos</button>
        <button class="btn btn-light">Entregas</button>
    </nav>

    <script src="script.js"></script>
</body>

<footer>
</footer>

</html>
<?php
}else{
    header("Location: index.php");
    exit();
}
?>