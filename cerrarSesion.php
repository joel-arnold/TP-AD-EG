<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cierre de sesión</title>
</head>

<body>
<?php
        if(!isset($_SESSION['legajo'])){
            echo "<script>
                    window.location.href='index.php';
                 </script>";
        }
        else{
            session_destroy();
            echo "<script>
            window.location.href='index.php';
            </script>";
        }
?>
</body>

</html>