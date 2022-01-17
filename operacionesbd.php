<?php
    class Operaciones{
        public $conexion=null;
        function __construct(){
            $this->conexion=mysqli_connect('localhost','root','','examen1_b');
        }
        function error(){
            //echo $this->conexion->errno;
            return $this->conexion->errno;
        }
        function consultar($consulta){
            return $this->conexion->query($consulta);
        }
        function cerrarSesion(){
            session_destroy();
            return 'index.php';
        }
        
    }
?>