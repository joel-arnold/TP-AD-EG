<?php

    session_start();

    include("conexion.php");

    $nombre = $_SESSION['nombre'];
    $materia = $_POST['materia'];

    $vSQL = "INSERT INTO inscripciones (alumno,materia) VALUES ('$nombre','$materia')";

    mysqli_query($link, $vSQL) or die(mysqli_error($link));

    echo'<script type="text/javascript">
            alert("Inscripción correcta");
            window.location.href = "inscripcionMaterias.php";
            </script>';
    
        mysqli_close($link);

?>