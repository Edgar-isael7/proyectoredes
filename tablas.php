<?php require_once "vistas/parte_superior.php"  ?>
<!--INICIO contenido principal-->
<div class="container">
    <h1>Pagina de tablas</h1>


    
    <?php
include_once '/xampp/htdocs/InicioDeSesion/bd/conexion1.php';
$objeto = new Conexion();
$conexion  = $objeto->Conectar();

$consulta = "SELECT Id, Usuario, Clave, correo FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>      
<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">            
        <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
        </div>    
    </div>    
</div>  -->  
<br>  
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Clave</th> 
                             <th>Acciones</th>                         
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        foreach($data as $dat) {                                                        
                        ?>
                        <tr>
                            <td><?php echo $dat['Id']      ?></td>
                            <td><?php echo $dat['Usuario'] ?></td>
                            <td><?php echo $dat['correo']  ?></td>
                            <td><?php echo $dat['Clave']   ?></td> 
                            <td></td>
                              
                          
                        </tr>
                        <?php
                            }
                        ?>                                
                    </tbody>        
                   </table>                    
                </div>
            </div>
    </div>  
</div>    





</div>
<!--FIN contenido principal-->
<?php require_once "vistas/parte_inferior.php"  ?>