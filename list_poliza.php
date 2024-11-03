<?php
session_start();
include "read_polizas.php";
$nombre="";
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
                if ($_SESSION['id'] == 5) {
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
    <div class="p-4 container container-poliza">
        <div class="tbl_container">
            <h2>Listas de polizas</h2>
        <form action="list_poliza.php?nombre=<?php $nombre; ?>" method="GET">
            <div class="d-flex flex-row justify-content-between align-items-end">
                <div>
                    <input type="text" class="form-control mr-5 inp-search" name="nombre" id="nombre"
                           placeholder="nombre" aria-label="nombre" aria-describedby="basic-addon2">
                </div>
                <?php if(isset($_POST['nombre'])){
                    $nombre = $_POST['nombre'];} ?>
                <div class="sel-search-first">
                    <span class="d-flex justify-content-center pb-2">Tipo:</span>
                    <select id="select" class="form-control select-search">
                        <option value="6th">6Th</option>
                        <option value="7th">7Th</option>
                    </select>
                </div>
                <div>
                    <span class="d-flex justify-content-center pb-2">Fecha:</span>
                    <select id="select" class="form-control select-search">
                        <option value="6th">6Th</option>
                        <option value="7th">7Th</option>
                    </select>
                </div>
                <div>
                    <span class="d-flex justify-content-center pb-2">Elaboro:</span>
                    <select id="select" class="form-control select-search">
                        <option value="6th">6Th</option>
                        <option value="7th">7Th</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning ml-5 btn-search" type="button">BUSCAR</button>
                </div>    
        </form>
            
            <hr>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <!-- Texto mostrado al completar con exito la operacion del control de usuario -->
            <?php if (isset($_GET['exito'])) { ?>
                <p class="exito"><?php echo $_GET['exito']; ?></p>
            <?php } ?>
            <!-- Si detecta registros de usuarios nos mostrara la tabla -->
            <?php if (mysqli_num_rows($result)) { ?>
                <table class="tbl tbl-poliza">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">*</th>
                            <th scope="col">Folio</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Elaboración</th>
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
                                <!--columna de folio-->
                                <td><?= $rows['id'] ?></td>
                                <!--columna de nombre-->
                                <td><?= $rows['file_url'] ?></td>
                                <!--columna de tipo-->
                                <td></td>
                                <!--columna de fecha-->
                                <td></td>
                                <!--columna de elaboración-->
                                <td></td>
                                <td>
                                    <button onclick="window.location.href='update.php?id=<?= $rows['id']?>'"><i
                                            class="fa fa-pencil"></i>
                                    </button>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" data-toggle="modal" data-target="#modalEliminar<?= $rows['id'] ?>"><i
                                            class="fa fa-trash"></i>
                                    </button>
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
                                                    <!--Inserta el boton de borrar usuario-->
                                                    <a href="delete.php?id=<?= $rows['id'] ?>&path=<?= $rows['file_url'] ?>" class="btn btn-danger">Borrar</a>
                                                </div>
                                </td>
                                <td>
                                    <button onclick="window.open('uploads/<?= $rows['file_url'] ?>','_blank')">
                                        <i class="fa fa-print"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>999</td>
                            <td>CFBI90S-655</td>
                            <td>Folio numero 999</td>
                            <td>Egreso</td>
                            <td>08/01/24</td>
                            <td>GMAIL</td>
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
            <?php }else{

            ?>
            <h3 class="text-center">No se encuentran archivos</h3>
            <?php }
            
            ?>
        </div>
    </div>
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