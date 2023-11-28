<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth=$_SESSION['login'] ?? false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
</head>
<body>
    <header>
    <?php if($auth):?>
        <a href="/logout">Cerrar Sesión</a>
    <?php endif;?>

    </header>

    <?php echo $contenido; ?>

    <script src="../build/js/bundle.min.js"></script>
</body>
</html>