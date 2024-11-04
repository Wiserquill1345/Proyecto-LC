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
                <h1>Subir polizas</h1>
            </div>
        </div>
        <!-- menu para mostrar los elementos que tendra el menu, con listas -->
        <nav>
            <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
            <ul class="menu">
                <!-- link al Inicio -->
                <li><a href="home.php">Home</a></li>
                
            </ul>
        </nav>
        

        <form action="upload_files.php" method="post" enctype="multipart/form-data">
            <div class="contenedor-main d-flex justify-content-center align-items-center flex-column">
            <?php if(isset($_GET['error'])): ?>
            <p class="error epol"><?php echo $_GET['error'];?></p>
        <?php endif ?>    
            <div class="contenedor-subir-archivos" id="dropArea">
                    <input type="file" style="display:none;" id="fileInput" name="my_files">
                    <img src="img/icon-file.png" id="uploadBtn">
                    <span id="fileName">Sin archivo</span>
                </div>
                <div class="p-4">
                    <input type="submit" name="submit" value="Subir">
                </div>
            </div>
        </form>

        <script type="text/javascript" src="script.js"></script>
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