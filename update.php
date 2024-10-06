<?php include 'update_users.php'; 
//Inicio la sesion o reanuda la que ya exista
session_start();
    //Si se inicio sesion de forma exitosa nos muestra la pagina de home
if($_SESSION['email']=="sebasmarti11@hotmail.com") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar usuarios</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div class="Welcome">
            <div>
            <img src="img/Logo_setues.png" alt="logo ues" class="logo">
            </div>
            <div class="texts">
                <h1>Actualizacion de usuarios</h1>
            </div>
        </div>
            <!-- menu para mostrar los elementos que tendra el menu, con listas -->
    <nav>
        <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="">Servicios</a>
                <ul>
                    <li><a class="sublista" href="users.php">Control de usuarios</a></li>               
                    <li><a class="sublista" href="users.php">---</a></li>
                </ul>
            </li>
        </ul>
        
        <!-- Crea un boton para el admin con la funcion de crear nuevos usuarios -->
    </nav>

        <div class="container">
            <div class="row d-flex justify-content-center container-register">
                <div class="col-md-4 ">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-center">
                            <h4>Actualizar</h4>
                        </div>

                        <form action="update_users.php" method="post" class="card-body">
                            <?php if(isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>   

                            <?php if(isset($_GET['exito'])) { ?>
                                <p class="exito"><?php echo $_GET['exito']; ?></p>
                            <?php } ?>   
                            
                            <div class="form-group">
                                <label>Nombre</label>
                                    <input type="text" 
                                        name="name" 
                                        class="form-control"
                                        value="<?=$row['nombre']?>">
                            </div>
                            
                            <div class="form-group">
                                <label>Correo electronico</label>
                                    <input type="email" 
                                        name="email" 
                                        class="form-control"
                                        value="<?=$row['email']?>">
                            </div>

                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" 
                                    name="password" 
                                    placeholder="********" 
                                    class="form-control">
                            </div>
                            <input type="text"
                                    name="id"
                                    value="<?=$row['id']?>"
                                    hidden>
                            <div class="div-btn_register d-flex align-items-center">
                                <button type="submit" class="btn btn-warning btn-block" name="update">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
<?php
}else{ 
    //si no es el admin de regreso al login
    header("Location: index.php");
    exit();
}
?>