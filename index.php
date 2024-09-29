<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>

<body>
    <div class="Welcome">
        <div>
            <img src="img/logo_welcome.png" alt="logo ues" class="image-logo">
        </div>
        <div class="texts">
            <h1>Inicio de sesion</h1>
        </div>
    </div>
    <nav class="navigator"></nav>

    <!-- Formulario del login-->
    <section class="section-login">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center div-form-login">
                <div class="card shadow-2-strong vh-80 p-5 form-container" style="border-radius: 1rem;">
                    
                    <div class="card-body pt-5 pl-5 pr-5 text-center">

                        <div class="mb-5 title-login">ACCESO</div>
                        <!-- Determina si anteriormente se intento hacer un inicio de sesion que termino siendo fallido y la razon del
                        por que -->
                        <?php if(isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                        <!-- Inicio del formulario la cual manda los datos registrados al documento login.php en donde se realiza la
                             verificacion de los usuarios-->
                        <form class="formulario" action="login.php" method="post">
                            <!-- label e input del email !-->
                            <div class="campo">
                                <input class="form-control form-control-lg" type="email" placeholder="Tu Email" name="email">
                            </div>
                            <!-- label e input de la contraseña !-->
                            <div class="campo">
                                <input class="form-control form-control-lg input__pass" type="password" placeholder="***********" id="password" name="password">
                                <!-- boton que permite al usuario ver o no ver la contraseña -->
                                <button type="button" class="input__showpass" id="togglePassword"><img src="img/ojo-on.png" style="width:100%;"/></button>
                            </div>
                            <!-- division -->
                            <hr>
                            <div class="campo d-flex align-items-center justify-content-between">
                                <!--link para mandar al usuario a recuperar su contraseña-->
                                <a class="a-login" href="signup.html"> Olvidé mi contraseña </a>
                                <!--boton para verificar si el correo o contraseña coinciden con la de algun usuario-->
                                <input type="submit" value="Entrar" class="btn btn-lg btn-block btn-login_submit">
                            </div>
                        </form>
                        <!-- Fin del formulario -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>
<footer>

</footer>

</html>