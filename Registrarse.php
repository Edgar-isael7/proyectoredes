<?php
//verificar por el mensaje de error no lo da en el registro de usuario y verificar por que no nos manda ha el menu

session_start();

include_once('../conexion.php');
if(isset($_POST['NombreCompleto']) && isset($_POST['CorreoElectronico']) && isset($_POST['Clave']) && isset($_POST['RClave']) ){
    function validar($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $Nombre = validar($_POST['NombreCompleto']);
    $Correo = validar($_POST['CorreoElectronico']);
    $clave = validar($_POST['Clave']);
    $Rclave = validar($_POST['RClave']);

    $datoNomreCompleto = 'NombreCompleto=' . $Nombre . 'CorreoElectronico=' . $Correo;
    
    if(empty($Nombre))
    {
header("location:../Registro.php?error=El usuario es requerido&$datoNomreCompleto");
exit();
    }elseif(empty($Correo)){
        header("location:../Registro.php?error=El Correo Electronico es requerido&$datoNomreCompleto");
exit();
    }elseif(empty($clave)){
        header("location:../Registro.php?error=La Clave es requerida&$datoNomreCompleto");
exit();
    }elseif(empty($Rclave)){
        header("location:../Registro.php?error=Repetir la Clave es requerida&$datoNomreCompleto");
exit();
    }elseif($clave !== $Rclave){
        header("location:../Registro.php?error=La clave no coincide&$datoNomreCompleto");
        exit();
    }else{
       // $clave = md5($clave);

        $sql  = "SELECT * FROM usuarios WHERE Usuario = '$Nombre' ";
        $query = $enlace->query($sql);

        if(mysqli_num_rows($query)>0  ){
            header("location:../Registrarse.php?error=El Usuario ya existe");
        exit();
        }else{
            $sql2 = "INSERT INTO usuarios(Usuario, correo, Clave) VALUES ('$Nombre','$Correo','$clave') ";
            $query2 = $enlace->query($sql2);

            if($query2){
                header("location:../Registro.php?success=Usuario creado con exito");
                
                exit();
                
            }else{
                header("location:../Registro.php?success=Ocurrio un error");
                exit();
            }
        }
    }
}else{
    header('location:../index.php');
    exit();
}
?>