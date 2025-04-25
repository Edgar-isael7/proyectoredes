<?php
session_start();
    include ('conexion.php');

if (isset($_POST['correo']) && isset($_POST['Clave']) ) { //se remplazo la variable "Usuario" por "correo"

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $correo = validate($_POST['correo']);//se remplazo la variable "Usuario" por "correo"
    $Clave = validate($_POST['Clave']);

    if(empty($correo)){//se remplazo la variable "Usuario" por "correo"
        header("location: index.php?error=El usuario es requerido");
        exit();
    }elseif (empty($Clave)){
        header("location: index.php?error=La contraseña es requerida");
        exit();
    }else{

      // $Clave = md5($Clave);

        $Sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND Clave='$Clave'";//se remplazo la variable "Usuario" por "correo"
        $result = mysqli_query($enlace, $Sql);

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['correo'] === $correo && $row['Clave'] === $Clave) {//se remplazo la variable "Usuario" por "correo"
                $_SESSION['correo'] = $row['correo'];//se remplazo la variable "Usuario" por "correo"
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: Inicio.php");
                exit();
            }else{
                header("Location: index.php?error=El usuario o la contraseña son incorrectas");
                exit();
            }
        }else{
            header("Location: index.php?error=El usuario o la contraseña son incorrectas");
            exit();
        } 
    }
}else{
    header("Location: index.php?");
    exit();
}