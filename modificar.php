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
            <h1>Modificar</h1>
        </header>
        <nav id="horizontal">
            <ul>
                <li><?php echo '<a href="'.$operaciones->cerrarSesion().'">Cerrar Sesión</a>';?></li>
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
                <?php
                    echo '<h4>Sesión iniciada con '.$_SESSION['nombreUsuario'];
                    //Compruebo que operación hay que realizar
                    if($_GET['op']=='corr'){
                        echo '<h3>Modificación del correo</h3>';
                        $consulta= "SELECT * FROM `administrador` WHERE idAdmin='".$_SESSION['id']."';";

                        $resultado=$operaciones->consultar($consulta);
                        while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
                            echo 
                            '
                                <form action="#" method="POST">
                                    Usuario: '.$fila['nombreUsuario'].' <br>
                                    Correo: <input type="text" id="correo" name="correo" value="'.$fila['correo'].'"/><br>
                                    <input type="submit" id="enviar" name="Enviar" />
                                </form>
                            ';
                            if(isset($_POST['enviar'])){
                                $consulta="UPDATE `administrador` SET `correo`='".$_POST['correo']."' WHERE `idAdmin`='".$fila['idAdmin']."'; ";
                                $resultado=$operaciones->consultar($consulta);
                            }
                        }
                        
                    }else{
                        echo '<h3>Modificación de la contraseña</h3>';
                        $consulta= "SELECT * FROM `administrador` WHERE idAdmin='".$_SESSION['id']."';";

                        $resultado=$operaciones->consultar($consulta);
                        while($fila=$resultado->fetch_array(MYSQLI_ASSOC)){
                            echo 
                            '
                                <form action="#" method="POST">
                                    Usuario: '.$fila['nombreUsuario'].' <br>
                                    Contraseña: <input type="text" id="contraseña" name="contraseña" value="'.$fila['password'].'"/><br>
                                    <input type="submit" id="enviar" name="Enviar" />
                                </form>
                            ';
                            if(isset($_POST['enviar'])){
                                $consulta="UPDATE `administrador` SET `password`='".$_POST['contraseña']."' WHERE `idAdmin`='".$_GET['idAdmin']."'; ";
                                $resultado=$operaciones->consultar($consulta);
                            }
                            
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
