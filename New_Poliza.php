<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva poliza</title>
    <link rel="stylesheet" href="css/Styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    <!-- Barra superior -->
    <div class="Welcome d-flex justify-content-between">
        <!-- Logo y nombre del documento -->
        <div class="texts d-flex align-items-center">
            <img src="img/Logo_setues.png" alt="logo ues" class="logo">
            <h1>Subir polizas</h1>
        </div>
    </div>
        <!-- menu para mostrar los elementos que tendra el menu, con listas -->
    <nav>
        <!-- este es el menu, donde se pondra los botones de dicha operacion que desea realizar -->
        <ul class="menu">
            <!-- link al Inicio -->
            <li><a href="home.php">Home</a></li>
                
        </ul>
    </nav>

    <section class="form-register">
        <h4 class="encabezado">AÑADIR NUEVA POLIZAS</h4>
        <input class="controls forget-input" type="text" name="nombres" id="nombres" placeholder="Ingrese el nombre">
        <input class="controls forget-input" type="text" name="tipo" id="tipo" placeholder="Ingrese el tipo">
        <input class="controls forget-input" type="Date" name="date" id="date">
        <input class="controls forget-input" type="text" name="concepto" id="concepto" placeholder="Ingrese el concepto">
        <input class="controls forget-input" type="email" name="elaboro" id="elaboro" placeholder="Ingrese como el correo">
        <input class="controls forget-input" type="text" name="estado" id="estado" placeholder="Ingrese el estado">
        <input class="controls forget-input" type="number" name="importe" id="importe" placeholder="Ingrese el importe">
        <div>
            <input class="botons" type="submit" value="Registrar">
        </div>
    </section>
</body>
</html>