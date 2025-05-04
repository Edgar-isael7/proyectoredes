<?php
include_once '../bd/conexion1.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//$_POST = json_decode(file("php://input"),true);

$Usuario =(isset($_POST['Usuario'])) ? $_POST['Usuario'] :'';
$Clave =(isset($_POST['Clave'])) ? $_POST['Clave'] :'';
$correo =(isset($_POST['correo'])) ? $_POST['correo'] :'';
$opcion =(isset($_POST['opcion'])) ? $_POST['opcion'] :'';
$Id =(isset($_POST['Id'])) ? $_POST['Id'] :'';

    switch($opcion) {
    case 1:
        $consulta = "INSERT INTO usuarios (Usuario,Clave ,correo ) VALUES('$Usuario','$Clave','$correo')";//
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        
        $consulta = "SELECT Id, Usuario , Clave , correo  FROM usuarios ORDER BY Id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
        break;
    case 2://modificar
        $consulta = "UPDATE usuarios SET Usuario='$Usuario', Clave='$Clave', correo='$correo' WHERE Id='$Id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT Id, Usuario , Clave , correo  FROM usuarios WHERE Id='$Id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3://eliminar
        $consulta = "DELETE FROM usuarios WHERE Id='$Id' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;  
    default:
    $data = ["error" => "Opción inválida"];
    break;  
    
                    }

print json_encode($data, JSON_UNESCAPED_UNICODE);

$conexion = null;

?>
