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
        <title>Inicio Sesión</title>
    </head>
    <body>
        <header>
            <h1>Inicio Sesión</h1>
        </header>
        <nav id="horizontalsesion">
            <ul>
                <?php
                    if(isset($_SESSION['nombreUsuario'])){
                        echo '<li><a>Inicio</a></li>';
                        echo '<li><a>¿Quiénes somos?</a></li>';
                        echo '<li><a>Gestión de Empleados</a></li>';
                        echo '<li><a href="'.$operaciones->cerrarSesion().'">Cerrar Sesión</a></li>';
                    }
                    
                ?>
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
                <p>Introduzca sus credenciales</p>
                <form action="#" method="POST">
                    Usuario: <input type="text" id="usuario" name="usuario" /><br>
                    Contraseña: <input type="password" id="contraseña" name="contraseña" /><br>
                    <input type="submit" id="enviar" name="Enviar" />
                </form>
                <?php
                    if($_POST){
                        //Escribo la consulta en una variable
                        $consulta="SELECT * FROM `administrador` WHERE nombreUsuario='".$_POST['usuario']."' AND password='".$_POST['contraseña']."';";
                        //Realizo la consulta llamando a consultar de operacionesbd
                        $resultado=$operaciones->consultar($consulta);
                        $fila=$resultado->fetch_array(MYSQLI_ASSOC);
                        if($fila){
                            $_SESSION['id']=$fila['idAdmin'];
                            $_SESSION['nombreUsuario']=$fila['nombreUsuario'];
                            //Escribo el usuario iniciado con los enlaces a modificar y la paso las variables necesarias por GET
                            echo 'Se ha iniciado sesión con el usuario: '.$fila['nombreUsuario'].'<br>';
                            echo '<a href="modificar.php?op=corr">Modificar correo</a><br>';
                            echo '<a href="modificar.php?op=contra">Modificar contraseña</a>';
                            header('refresh:1');
                            
                        }else{
                            echo 'No se ha iniciado sesión correctamente';
                        }
                        

                    }
                ?>
            </section>
        </aside>
        <footer>
            <h3>Footer</h3>
        </footer>
    </body>
</html>