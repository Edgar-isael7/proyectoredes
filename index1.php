<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Contenido principal</h1>
    
    
    
 <?php
include_once '/xampp/htdocs/InicioDeSesion/bd/conexion1.php';
$objeto = new Conexion();
$conexion  = $objeto->Conectar();

$consulta = "SELECT Id, Usuario, Clave, correo FROM usuarios";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>      
<div class="container">
    <div class="row">
        <div class="col-lg-12">            
        <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
        </div>    
    </div>    
</div>    
<br>  
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">        
                    <table id="tablausuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Clave</th> 
                            <th>Correo</th>
                            <th>Acciones</th>                          
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php                            
                        foreach($data as $dat) {                                                        
                        ?>
                        <tr>
                            <td><?php echo $dat['Id'] ?></td>
                            <td><?php echo $dat['Usuario'] ?></td>
                            <td><?php echo $dat['Clave'] ?></td> 
                            <td><?php echo $dat['correo'] ?></td>
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
   
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
        </div>
    <form id="formusuarios">    
        <div class="modal-body">
            <div class="form-group">
            <label for="Usuario" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="Usuario">
            </div>
            <div class="form-group">
            <label for="correo" class="col-form-label">Correo:</label>
            <input type="text" class="form-control" id="correo">
            </div>  
            <div class="form-group">
            <label for="Clave" class="col-form-label">Clave:</label>
            <input type="text" class="form-control" id="Clave">
            </div>               
                 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
        </div>
    </form>    
        </div>
    </div>
</div>  

<!--FIN del cont principal-->


<?php require_once "vistas/parte_inferior.php"?>