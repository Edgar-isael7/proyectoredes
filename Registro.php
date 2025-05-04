<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/stayle1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Registrarse</title>

</head>
<body>

    <div class="contenedor">

        <h1>Registrar Usuario</h1>
        <hr>
       
        <form action="Login/Registrarse.php" method="POST">
        <?php if(isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']?></p>
        <?php } ?>
            
        <?php if(isset($_GET['succes'])){ ?>
            <p class="succes"><?php echo $_GET['succes']?></p>
        <?php } ?>
       
            <label for="">
                <img width="25px" src="ICONS/user.svg" alt="">
                Usuario
            </label>
            <input type="text" placeholder="Ingrese Nombre Completo" name="NombreCompleto">
            
            <label for="">
                <img width="25px" src="ICONS/Mail.svg" alt="">
                Correo Electronico
            </label>
            <input type="text" placeholder="Ingrese Correo Electronico" name="CorreoElectronico">

            <label for="">
            <img width="25px" src="ICONS/key.svg" alt="">
            Clave
            </label>
            <input type="password" placeholder="Ingrese Clave" name="Clave">

            <label for="">
            <img width="25px" src="ICONS/key.svg" alt="">
            Repetir Clave
            </label>
            <input type="password" placeholder="Repita Clave" name="RClave">
            <hr>

            <input type="submit" class="button" value="Registrarse">

            <a href="index.php" class="Boton_ingresar">
            Ingresar 
            </a>

            </form>


       
    </div>
   
</body>
</html>