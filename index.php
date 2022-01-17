<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    /*Juan Manuel Toscano Reyes*/
    require 'operacionesbd.php';
    $operaciones=new Operaciones();
    /*$conexion=mysqli_connect('localhost','root','','examen1_a');*/
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Juan Manuel Toscano Reyes">
        <link rel="stylesheet" href="css/style.css">
        <title>Inicio</title>
    </head>
    <body>
        <header>
            <h1>Inicio</h1>
        </header>
        <nav id="horizontal">  
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a>Quienes somos</a></li>
                <li><a href='iniciosesion.php'>Iniciar Sesión</a></li>
            </ul>
        </nav>
        <aside>
            <nav id="vertical">
                <ul>
                    <li><a>Lorem</a></li>
                    <li><a>Lorem</a></li>
                </ul>
            </nav>
            <section>
                
            </section>
        </aside>
        <footer>
            <h3>Footer</h3>
        </footer>
    </body>
</html>