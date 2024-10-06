<?php 
session_start();
include "read_users.php"; 
    //Si se inicio sesion de forma exitosa nos muestra la pagina de home
if(isset($_SESSION['id']) && isset($_SESSION['email'])) {
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de usuarios</title>
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
<div class="Welcome">
        <div>
            <img src="img/logo_welcome.png" alt="logo ues" class="image-logo">
        </div>
        <div class="texts">
            <h1>Control de usuarios</h1>
        </div>
    </div>
    
    <!-- Botones -->
    <nav>
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
        </ul>
        <!-- Crea un boton para el admin con la funcion de crear nuevos usuarios -->
    </nav>
    <div class="p-4 container">
        <div class="p-4 box ">
            <h4 class="display-4 text-center">Usuarios</h4>
            <hr>
            <?php if(mysqli_num_rows($result)){ ?>

            
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i=0;
                while($rows = mysqli_fetch_assoc($result)){
                    $i++;
        
                ?>
                <tr class="tr-rows">
                <th scope="row"><?=$i?></th>
                <td><?=$rows['nombre']?></td>
                <td><?php echo $rows['email'];?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>
            <?php } ?>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success"  onclick="window.location.href='register.php'" >Crear usuario</button>
        </div>
    </div>
    </div>
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