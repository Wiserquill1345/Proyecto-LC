<?php

//Resume la sesion
session_start();

//Obtenemos la consulta de lectura de las polizas
include "read_polizas.php";

//Variable declarada para la filtracion de polizas
$nombre = "";

//Mostramos la pagina si el id y el correo coinciden
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de polizas</title>
        <link rel="stylesheet" href="css/Styles.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>

    <body class="index-body">
        <!-- Barra superior -->
        <div class="Welcome d-flex justify-content-between">
            <!-- Logo y nombre del documento -->
            <div class="texts d-flex align-items-center">
                <img src="img/Logo_setues.png" alt="logo ues" class="logo">
                <h1>Portal personal</h1>
            </div>

            <div class="texts t2 d-flex align-items-end flex-column pr-5">
                <!-- Muestra el nombre del usuario -->
                <h1>Bienvenid@, <?php echo $_SESSION['name']; ?></h1>

                <div class="links ">
                    <!-- link al perfil del usuario -->
                    <a class="text-decoration-none text-white pr-5" href="logout.php">Perfil</a>
                    <!-- Cierra la sesion del usuario -->
                    <a class="text-decoration-none text-white pr-4" href="logout.php">Cerrar Sesion</a>
                </div>

            </div>
        </div>
        <!-- menu para mostrar los elementos que tendra el menu, con listas -->
        <nav>
            <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
            <ul class="menu">
                <!-- link al Inicio -->
                <li><a href="home.php">Home</a></li>
                <!-- boton para desplegar los servicios del portal -->
                <li><a href="">Servicios</a>
                    <ul>
                        <li><a class="sublista" href="upload.php">Subida de polizas</a></li>
                        <li><a class="sublista" href="list_poliza.php">Control de polizas</a></li>
                        <li><a class="sublista" href="registerEmployee.php">Control de profesores</a></li>
                    </ul>
                </li>
                <?php
                if ($_SESSION['id'] == 1) {
                    ?>
                    <li><a href="">Control de usuarios</a>
                        <ul>
                            <li><a class="sublista" href="user-control/users.php">Lista de usuarios</a></li>
                            <li><a class="sublista" href="user-control/create.php">Alta de usuarios</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <div class="container_logo">
        </div>
        <!-- Contenedor de la poliza -->
        <div class="p-4 container container-poliza">
            <div class="tbl_container">
                <h2>Listas de polizas</h2>

                <!-- Formulario para el filtrado de polizas -->
                <form action="list_poliza.php?nombre=<?php $nombre; ?>" method="GET">
                    <div class="d-flex flex-row justify-content-between align-items-end">
                        <div>
                            <!-- Input para el nombre -->
                            <input type="text" class="form-control mr-5 inp-search" name="nombre" id="nombre"
                                placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon2">
                        </div>
                        <?php if (isset($_POST['nombre'])) {
                            $nombre = $_POST['nombre'];
                        } ?>
                        <!-- Select para el tipo de poliza -->
                        <div class="sel-search-first">
                            <span class="d-flex justify-content-center pb-2">Tipo:</span>
                            <select id="select" class="form-control select-search">
                                <option value="6th">6Th</option>
                                <option value="7th">7Th</option>
                            </select>
                        </div>
                        <!-- Select para la fecha de poliza -->
                        <div>
                            <span class="d-flex justify-content-center pb-2">Fecha:</span>
                            <select id="select" class="form-control select-search">
                                <option value="6th">6Th</option>
                                <option value="7th">7Th</option>
                            </select>
                        </div>
                        <!-- Select quien elaboro la poliza -->
                        <div>
                            <span class="d-flex justify-content-center pb-2">Elaboro:</span>
                            <select id="select" class="form-control select-search">
                                <option value="6th">6Th</option>
                                <option value="7th">7Th</option>
                            </select>
                        </div>

                        <!-- Boton para mandar la informacion del formulario a la consulta -->
                        <button type="submit" class="btn btn-warning ml-5 btn-search" type="button">BUSCAR</button>
                    </div>
                </form>

                <hr>
                <!-- Nos muestra si hubo un error -->
                <?php if (isset($_GET['error'])) { ?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <!-- Texto mostrado al completar con exito la operacion -->
                <?php if (isset($_GET['exito'])) { ?>
                    <p class="exito"><?php echo $_GET['exito']; ?></p>
                <?php } ?>
                <!-- Si detecta registros de usuarios nos mostrara la tabla -->
                <?php if (mysqli_num_rows($result)) { ?>
                    <table class="tbl tbl-poliza">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">*</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Concepto</th>
                                <th scope="col">Elaboró</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Importe</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            //Se realizan iteraciones de los registros mientras falten registros por mostrar
                            while ($rows = mysqli_fetch_assoc($result)) {
                                $i++;
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <!--columna de nombre-->
                                    <td><?= $rows['nombre'] ?></td>
                                    <!--columna de tipo-->
                                    <td><?= $rows['tipo'] ?></td>
                                    <!--columna de fecha-->
                                    <td><?= $rows['fecha'] ?></td>
                                    <!--columna de concepto-->
                                    <td><?= $rows['concepto'] ?></td>
                                    <!--columna de elaboró-->
                                    <td><?= $rows['elaboro'] ?></td>
                                    <!--columna de estado-->
                                    <td><?= $rows['estado'] ?></td>
                                    <!--columna de importe-->
                                    <td>$<?= $rows['importe'] ?></td>
                                    <!--columna del boton para actualizar -->
                                    <td>
                                        <button onclick="window.location.href='update.php?id=<?= $rows['id'] ?>'"><i
                                                class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <!--columna del boton para el boton de eliminar -->
                                    <td>
                                        <!-- Boton que abre un modal -->
                                        <button type="button" data-toggle="modal" data-target="#modalEliminar<?= $rows['id'] ?>"><i
                                                class="fa fa-trash"></i>
                                        </button>

                                        <!-- Modal del boton de eliminar -->
                                        <div class="modal fade" id="modalEliminar<?= $rows['id'] ?>" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Eliminar archivo</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estas seguro de que quieres eliminar el archivo:
                                                        "<span class="text-danger"><?= $rows['file_url'] ?></span>"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <!--boton de borrar poliza-->
                                                        <a href="delete.php?id=<?= $rows['id'] ?>&path=<?= $rows['file_url'] ?>"
                                                            class="btn btn-danger">Borrar</a>
                                                    </div>
                                    </td>
                                    <!--columna del boton para mostrar la poliza -->
                                    <td>
                                        <button onclick="window.open('uploads/<?= $rows['file_url'] ?>','_blank')">
                                            <i class="fa fa-print"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>

                            <!-- Placeholder de un registro (eliminar en version final) -->
                            <tr>
                                <td>999</td>
                                <td>CFBI90S-655</td>
                                <td>EGRESOS</td>
                                <td>2024-09-20</td>
                                <td>Revision numero 46</td>
                                <td>GMAIL</td>
                                <td>VIGENTE</td>
                                <td>$3200.00</td>
                                <td>
                                    <button><i class="fa fa-pencil"></i></button>
                                </td>
                                <td>
                                    <button><i class="fa fa-trash"></i></button>
                                </td>
                                <td>
                                    <button><i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                
                <!--Si no se encuentran registros mandar un mensaje -->
                <?php } else {

                    ?>
                    <h3 class="text-center">No se encuentran archivos</h3>
                <?php }

                ?>
            </div>
        </div>
        <!-- Scripts para el modal -->
        <script src="https://code.jquery.com/jquery-3.1.1.js">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.js">
        </script>
    </body>
</html>

    <?php
} else {
    //si no se encuentra al usuario o la contraseña es incorrecta nos regresa al login
    header("Location: index.php");
    exit();
}
?>