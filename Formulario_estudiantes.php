<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Añadir estudiantes</h4>
                    </div>

                    <form id="Estudianteform" class="card-body">
                        <div class="form-group">
                            <label>Nombre del alumno</label>
                            <input type="text" id="Name" placeholder="Nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo electronico</label>
                            <input type="email" id="Correo" placeholder="Correo electronico" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Numero de expediente</label>
                            <input type="number" id="Numero" placeholder="Numero de expediente" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>