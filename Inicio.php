<?php 
    session_start();
    if (isset($_SESSION['Id']) && isset($_SESSION['Usuario'])){

   
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>INICIO</title>

</head>

<body>
    <form action="" backgrouncolor></form>
    <center>
        <H1>Inicio Sesion</H1>
    </center>
    <a href="CerrarSesion.php" class="btn bnt-danger">Cerrar Sesion</a>

    <h2>Nombre del  usuario</h2>


    <h3>tabla</h3>

    
</body>

</html>
<?php   }else{
    header('location: ../index.php');
}?>