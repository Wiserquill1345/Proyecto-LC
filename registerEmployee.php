<!-- Pagina de registrar empleados (Se dejo por prevencion pero si no es necesario, borrar en la version final) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de profesores</title>
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="Welcome">
        <div>
            <img src="img/Logo_setues.png" alt="logo ues" class="logo">
        </div>
        <div class="texts">
            <h1>Registro de profesores</h1>
        </div>
    </div>
    <nav>
        <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
        <ul class="menu">
            <li><a href="home.php">Home</a></li>
            <li><a href="">Servicios</a>
                <ul>
                    <li><a class="sublista" href="users.php">Control de usuarios</a></li>               
                    <li><a class="sublista" href="registerEmployee.php">Control de profesores</a></li>
                </ul>
            </li>
        </ul>
        <!-- Crea un boton para el admin con la funcion de crear nuevos usuarios -->
    </nav>
        <div class="container">
            <div class="row d-flex justify-content-center container-register">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-center">
                            <h4>Añadir profesor</h4>
                        </div>
                    
                        <form action="" id="employeeForm" class="card-body">
                            <div class="form-group">
                                <label>Expediente</label>
                                <input type="text" placeholder="Expediente del profesor" id="expediente" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" placeholder="Nombre del profesor" id="nombreProfesor" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input type="text" placeholder="Apellido del profesor" id="apellidoProfesor" class="form-control">
                            </div>
                    
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input type="email" placeholder="correo del profesor" id="CorreoProfesor" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Area laboral</label>
                                <input type="text" placeholder="Area de trabajo del profesor" id="AreaProfesor" class="form-control">
                            </div>
                            <div class="div-btn_register d-flex align-items-center">
                                <button type="submit" id="RegistroProfesor" class="btn btn-warning btn-block">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>