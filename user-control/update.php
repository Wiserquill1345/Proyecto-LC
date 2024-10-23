<?php include 'php/update_users.php';
//Inicio la sesion o reanuda la que ya exista
session_start();
//Si el que inicia la sesion es el admin entonces nos muestra el documento
if ($_SESSION['email'] == "sebasmarti11@hotmail.com") {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Cabeza del documento -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar usuarios</title>
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/Styles.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>

    <!-- Cuerpo del documento -->
    <body>
        <div class="Welcome d-flex justify-content-between">
            <div class="texts d-flex align-items-center">
                <img src="../img/Logo_setues.png" alt="logo ues" class="logo">
                <h1>Actualización de usuarios</h1>
            </div>
        </div>
        <!-- menu para mostrar los elementos que tendra el menu, con listas -->
        <nav>
            <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
            <ul class="menu">
                <!-- link al Inicio -->
                <li><a href="../home.php">Home</a></li>
                <!-- boton para desplegar los servicios del portal -->
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a class="sublista" href="../upload.php">Subida de polizas</a></li>
                        <li><a class="sublista" href="../list_poliza.php">Control de polizas</a></li>
                        <li><a class="sublista" href="../registerEmployee.php">Control de profesores</a></li>
                    </ul>
                </li>
                <?php
                    if ($_SESSION['id'] == 5) {
                ?>
                <li><a href="">Control de usuarios</a>
                    <ul>
                        <li><a class="sublista" href="users.php">Lista de usuarios</a></li>
                        <li><a class="sublista" href="create.php">Alta de usuarios</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
        </nav>


        <div class="container">
            <div class="row d-flex justify-content-center container-register">
                <div class="col-md-4 update_user">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-center">
                            <h4>Actualizar</h4>
                        </div>
                        
                        <!-- Formulario del documento -->
                        <form action="php/update_users.php" method="post" class="card-body">
                            <!-- Texto mostrado al haber un error en la operacion de la actualizacion de usuario -->
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <!-- Texto mostrado al haber un exito en la operacion de la actualizacion de usuario -->
                            <?php if (isset($_GET['exito'])) { ?>
                                <p class="exito"><?php echo $_GET['exito']; ?></p>
                            <?php } ?>
                            
                            <!-- label e input del nombre del usuario -->
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" value="<?= $row['nombre'] ?>">
                            </div>
                            
                            <!-- label e input del correo del usuario -->
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>">
                            </div>
                            
                            <!-- label e input de la contraseña del usuario -->
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" placeholder="********" class="form-control">
                            </div>

                            <!-- input secreto del usuario -->
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>

                            <!-- boton para guardar la informacion que mandaremos al update_users -->
                            <div class="div-btn_register d-flex align-items-center">
                                <button type="submit" class="btn btn-warning btn-block" name="update">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <footer></footer>

    </html>
    <?php
} else {
    //si no es el admin de regreso al login
    header("Location: ../index.php");
    exit();
}
?>