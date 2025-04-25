<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inicio de sesion</title>
</head>
<body>
    <form action="IniciarSesion.php" method="POST">
        <h1>Iniciar Sesion</h1> 
        <hr>
        <?php
            if(isset($_GET['error'])){
                ?>
            <p class="error">
            <?php
            echo $_GET['error']
            ?>
            </p>
         <?php
            }
        ?>
            
    
        <i class="fa-solid fa-envelope"></i>
        <label>Correo</label>
         <input type="text" name="correo" placeholder="Correo Electronico"> 

        <i class="fa-solid fa-unlock"></i>
        <label>Clave</label>
         <input type="password" name="Clave" placeholder="Clave">
         <hr>
         <button type="submit">Iniciar Sesion</button>
         <a href="Registro.php" class="Boton_cuenta">
            Crear Cuenta
        </a>
    </form>
</body>
</html>