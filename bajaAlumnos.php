<?php
  session_start();

  if(!($_SESSION['tipoUsuario'] == "Administrador")){
    header("Location: noLogueado.php");
    exit();
  }
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Menú ABM Alumnos</title>

    
   <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css"/>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet"/>

    <link href="estilo.css" rel="stylesheet" type="text/css" />

    

</head>
<body id="page-top">

    <?php include("encabezado.php"); ?>

    <header class="masthead bg-primary text-white text-center">
        <h2 class="font-weight-light mb-0">BAJA DE ALUMNOS</h2>
            <hr class="star-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 formModifAlumnos">
                        <form class="form-horizontal" role="form" action="bajaPersonasLegajo.php" method="POST" name="formBaja">
                            <div class="form-group">
                                <label for="inputLegajoBaja" class="label-sm-2">Eliminación por legajo:</label>
                                <div class="input-sm-5">
                                    <input type="text" class="form-control" id="inputLegajoBaja" name="legajo" placeholder="Legajo"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="boton-sm-offset-2">
                                <button type="submit" class="btn btn-default">Borrar</button>
                                <a class="btn btn-secondary volver" href="menuAdministrador.php">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 formModifAlumnos">
                        <form class="form-horizontal" role="form" action="bajaPersonasNombre.php" method="POST" name="formBaja">
                            <div class="form-group">
                                <label for="inputLegajoBaja" class="label-sm-2">Eliminación por nombre:</label>
                                <div class="input-sm-5">
                                    <select class="form-control" name="nombreElegido" id="inputLegajoBaja">
                                            <?php
                                                include("conexion.php");
                                                $vSQL = "select * from usuario where tipo_usuario = 'Alumno'";
                                                $vResultado = mysqli_query($link, $vSQL) or die(mysqli_error($link));
                                                $cant_filas = mysqli_num_rows($vResultado);
                                                if($cant_filas == 0){
                                                    ?> <option>No hay alumnos cargados</option> <?php
                                                    }
                                                    else{
                                                        while ($fila = mysqli_fetch_array($vResultado)){
                                                            ?>
                                                            <option> <?php echo $fila['nombre_apellido']; ?> </option>
                                                            <?php
                                                        }
                                                        mysqli_free_result($vResultado);
                                                        mysqli_close($link);
                                                    }
                                            ?>                                            
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="boton-sm-offset-2">
                                <button type="submit" class="btn btn-default">Borrar</button>
                                <a class="btn btn-secondary volver" href="menuAdministrador.php">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </header>

    <?php include("pieDePagina.php"); ?>

    <script src="validacion.js"></script>

</body>

</html>