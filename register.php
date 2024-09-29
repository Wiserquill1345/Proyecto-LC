<?php
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
        <title>Registro de usuarios</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/bootstrap.css">
    </head>
    <body>
        <div class="Welcome">
            <div>
                <img src="img/logo_welcome.png" alt="logo ues" class="image-logo">
            </div>
            <div class="texts">
                <h1>Registro de estudiante</h1>
            </div>
        </div>

        <div class="container">
            <div class="row d-flex justify-content-center container-register">
                <div class="col-md-4 ">
                    <div class="card ">
                        <div class="card-header d-flex justify-content-center">
                            <h4>Añadir usuario</h4>
                        </div>

                        <form action="signup-check.php" method="post" id="Userform" class="card-body">
                            <?php if(isset($_GET['error'])) { ?>
                                <p class="error"><?php echo $_GET['error']; ?></p>
                            <?php } ?>   

                            <?php if(isset($_GET['exito'])) { ?>
                                <p class="exito"><?php echo $_GET['exito']; ?></p>
                            <?php } ?>   
                            
                            <div class="form-group">
                                <label>Nombre</label>
                                <?php if(isset($_GET['name'])) { ?>
                                    <input type="text" 
                                        name="name" 
                                        placeholder="Nombre" 
                                        class="form-control"
                                        value="<?php echo $_GET['name']; ?>">
                                <?php }else{ ?>
                                    <input type="text" 
                                        name="name" 
                                        placeholder="Nombre" 
                                        class="form-control">
                                <?php } ?>
                            </div>
                            
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <?php if(isset($_GET['email'])) { ?>
                                    <input type="email" 
                                        name="email" 
                                        placeholder="Correo electronico" 
                                        class="form-control"
                                        value="<?php echo $_GET['email']; ?>">
                                <?php }else{ ?>
                                    <input type="email"
                                        name="email" 
                                        placeholder="Correo electronico" 
                                        class="form-control">
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" 
                                    name="password" 
                                    placeholder="********" 
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Repetir contraseña</label>
                                <input type="password" 
                                    name="re-password" 
                                    placeholder="********" 
                                    class="form-control">
                            </div>

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
}else{ 
    //si no es el admin de regreso al login
    header("Location: index.php");
    exit();
}
?>