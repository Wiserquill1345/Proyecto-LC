<?php
session_start();
include "php/read_users.php";
//Si el que inicia la sesion es el admin entonces nos muestra el documento
if ($_SESSION['email'] == "sebasmarti11@hotmail.com") {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <!-- Cabeza del documento -->

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Control de usuarios</title>
        <link rel="stylesheet" href="../css/Styles.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    </head>

    <!-- Cuerpo del documento -->

    <body>
        <div class="Welcome d-flex justify-content-between">
            <div class="texts d-flex align-items-center">
                <img src="../img/Logo_setues.png" alt="logo ues" class="logo">
                <h1>Control de usuarios</h1>
            </div>
        </div>


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


        <!-- Tabla de usuarios -->
        <div class="p-4 container">
            <div class="p-4 box ">
                <h4 class="display-4 text-center">Usuarios</h4>
                <!-- Texto mostrado al haber un error en la operacion del control de usuario -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <!-- Texto mostrado al completar con exito la operacion del control de usuario -->
                <?php if (isset($_GET['exito'])) { ?>
                    <p class="exito"><?php echo $_GET['exito']; ?></p>
                <?php } ?>
                <hr>
                <!-- Si detecta registros de usuarios nos mostrara la tabla -->
                <?php if (mysqli_num_rows($result)) { ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <!-- Titulo de columnas -->
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            //Se realizan iteraciones de los registros mientras falten registros por mostrar
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $i++;
                                ?>
                                <tr class="tr-rows">
                                    <th scope="row"><?= $i ?></th>
                                    <!--columna de nombre-->
                                    <td><?= $rows['nombre'] ?></td>
                                    <!--columna de email-->
                                    <td><?php echo $rows['email']; ?></td>
                                    <!--columna de botones-->
                                    <td>
                                        <!--Inserta el boton de actualizar usuario-->
                                        <a href="update.php?id=<?= $rows['id'] ?>" class="btn btn-primary">Actualizar</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modalEliminar<?= $rows['id'] ?>">
                                            Eliminar
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalEliminar<?= $rows['id'] ?>" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Eliminar usuario</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estas seguro de que quieres eliminar al usuario: 
                                                        "<span class="text-danger"><?= $rows['nombre'] ?></span>"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <!--Inserta el boton de borrar usuario-->
                                                        <a href="php/delete.php?id=<?= $rows['id'] ?>"
                                                            class="btn btn-danger">Borrar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
<script src="https://code.jquery.com/jquery-3.1.1.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js">
</script>
    </body>
    <footer>

    </footer>

    </html>
    <?php
} else {
    //si no se encuentra al usuario o la contraseña es incorrecta nos regresa al login
    header("Location: ../index.php");
    exit();
}
?>