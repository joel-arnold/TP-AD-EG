<?php session_start(); 

    ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><?php

    include("conexion.php");
    
    $usuario = $_POST['legajo'];
    $contrasena = $_POST['contrasena'];

    $vSQL = "select * from usuario where legajo = '$usuario'and pass = '$contrasena'";

    $vResultado = mysqli_query($link, $vSQL) or die(mysqli_error($link));

    $fila = mysqli_fetch_array($vResultado);

    if(mysqli_num_rows($vResultado)==0){

        echo'<script type="text/javascript">
                alert("Usuario o Contraseña Incorrecta");
                window.location.href = "iniciarSesion.php";
                </script>';
    }
    else{
        $_SESSION['nombre'] = $fila['nombre_apellido'];
        $_SESSION['legajo'] = $usuario;
        $_SESSION['tipoUsuario'] = $fila['tipo_usuario'];
    }
    
    if($fila['tipo_usuario'] == "Administrador"){
         
        echo'<script type="text/javascript">
        window.location.href = "menuAdministrador.php";
        </script>';

    }
    else if($fila['tipo_usuario'] == "Alumno"){
        echo'<script type="text/javascript">
        window.location.href = "menuAlumno.php";
        </script>';           
    }

    else if($fila['tipo_usuario'] == "Docente"){
        echo'<script type="text/javascript">
        window.location.href = "menuDocente.php";
        </script>';
    }
      

        mysqli_free_result($vResultado);
		mysqli_close($link);

?>