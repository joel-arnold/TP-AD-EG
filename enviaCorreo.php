<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Contacto</title>
</head>

<body>
    <?php
        $nombre = $_POST['nombrecito'];
        $fecha=date("d-m-Y");
        $hora= date("H :i:s");
        $correoDestino="joel.arnold.ar@gmail.com";
        $telefono = $_POST['phone'];
        $asunto="Contacto de un usuario a través la web.";
        $correoEmisor="$_POST['email'];"
        $comentario=$_POST['message'];
        $cuerpoMensaje="
        \n
        Nombre: $nombre\n
        Email: $correoEmisor\n
        Teléfono: $telefono\n
        Consulta: $comentario\n
        Enviado: $fecha a las $hora\n
        ";
        
        mail($correoDestino, $asunto, $cuerpoMensaje, $correoEmisor);
        echo "<script>window.alert('Consulta enviada. Gracias por contactarnos.');</script>";

    ?>
</body>

</html>