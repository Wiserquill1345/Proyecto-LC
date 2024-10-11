<?php
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
        <title>Registro de usuarios</title>
        <link rel="stylesheet" href="../css/Styles.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/normalize.css">
    </head>

    <!-- Cuerpo del documento -->
    <body>
        <div class="Welcome d-flex justify-content-between">
            <div class="texts d-flex align-items-center">
                <img src="../img/Logo_setues.png" alt="logo ues" class="logo">
                <h1>Registro de usuarios</h1>
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
                        <li><a class="sublista" href="../empleados.php">Lista de empleados</a></li>
                        <li><a class="sublista" href="../empleados.php">---</a></li>
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
                <div class="col-md-4 add_user">
                    <div class="card">
                        <div class="card-header d-flex justify-content-center">
                            <h4>Añadir usuario</h4>
                        </div>
                        <!-- Formulario del documento -->
                        <form action="php/create_users.php" method="post" id="Userform" class="card-body">
                            <!-- Texto mostrado al haber un error en la operacion del registro de usuario -->
                            <?php if (isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>
                            <!-- Texto mostrado al haber un exito en la operacion del registro de usuario -->
                            <?php if (isset($_GET['exito'])) { ?>
                                <p class="exito"><?php echo $_GET['exito']; ?></p>
                            <?php } ?>

                            <!-- label e input del nombre del usuario-->
                            <div class="form-group">
                                <label>Nombre</label>
                                <!-- Si anteriormente se intento registrar el usuario pero hubo un error entonces agregaremos de nuevo
                                     el nombre del usuario -->
                                <?php if (isset($_GET['name'])) { ?>
                                    <input type="text" name="name" placeholder="Nombre" class="form-control"
                                        value="<?php echo $_GET['name']; ?>">
                                <?php } else { ?>
                                    <!-- input vacio -->
                                    <input type="text" name="name" placeholder="Nombre" class="form-control">
                                <?php } ?>
                            </div>

                            <!-- label e input del correo electronico -->
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <!-- Si anteriormente se intento registrar el usuario pero hubo un error entonces agregaremos de nuevo
                                     el email del usuario -->
                                <?php if (isset($_GET['email'])) { ?>
                                    <input type="email" name="email" placeholder="Correo electronico" class="form-control"
                                        value="<?php echo $_GET['email']; ?>">
                                <?php } else { ?>
                                    <!-- input vacio -->
                                    <input type="email" name="email" placeholder="Correo electronico" class="form-control">
                                <?php } ?>
                            </div>
                            
                            <!-- label e input de la contraseña -->
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" name="password" placeholder="********" class="form-control">
                            </div>
                            
                            <!-- label e input de repetir la contraseña -->
                            <div class="form-group">
                                <label>Repetir contraseña</label>
                                <input type="password" name="re-password" placeholder="********" class="form-control">
                            </div>
                            
                            <!-- boton que tomara la informacion del formulario y la enviara a signup-check -->
                            <div class="div-btn_register d-flex align-items-center">
                                <button type="submit" id="Registro" class="btn btn-warning btn-block">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
    <?php
} else {
    //si no es el admin de regreso al login
    header("Location: ../index.php");
    exit();
}
?>