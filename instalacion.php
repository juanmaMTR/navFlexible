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
        <title>Instalacion</title>
    </head>
    <body>
        <header>
            <h1>Instalación</h1>
        </header>
        <nav id="horizontal">
            <ul>
                <li><a>Lorem</a></li>
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
                <p>Introduzca los datos del usuario que va a administrar la aplicación.</p>
                <form action="#" method="POST">
                    Nombre Usuario: <input type="text" id="usuario" name="usuario" /><br>
                    Correo: <input type="text" id="correo" name="correo" /><br>
                    Contraseña: <input type="text" id="contraseña" name="contraseña" /><br>
                    Repita la contraseña: <input type="text" id="repetircontraseña" name="repetircontraseña" /><br>
                    Por su seguridad, introduzca el código asignado: <input type="text" id="codigo" name="codigo" /><br>
                    <input type="submit" id="enviar" name="Enviar" />
                </form>
                <?php
                    if($_POST){
                        if($_POST['contraseña']!=$_POST['repetircontraseña']){
                            $error=$operaciones->error();
                            if($error==0){
                                echo 'Las contraseñas no coinciden <br>';
                            }
                            
                            //return false;
                        }else{
                            if($_POST['codigo']!='ar2b'&&$_POST['codigo']!='3k2c'&&$_POST['codigo']!='t97f'){
                                
                                $error=$operaciones->error();
                                if($error==0){
                                    echo 'El codigo de seguridad no coincide <br>';
                                }
                            }else{
                                $consulta="INSERT INTO `administrador`(`nombreUsuario`,`password`,`correo`,`codigo`,`idTipo`) VALUES ('".$_POST['usuario']."','".$_POST['contraseña']."','".$_POST['correo']."','".$_POST['codigo']."','1');";
                        
                                $resultado=$operaciones->consultar($consulta);
                                echo 'Consulta realizada correctamente.';
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