<?php 

 
  headerAdmin($data);
  getModal('modalClientes',$data);


?>


<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title']; ?>
             
             <!-- boton para agregar nuevo rol -->
             <button class="btn btn-success" type="button" id="openclientes"><i class="fas fa-plus-circle"></i> Nuevo</button>
          
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-users"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><?= $data['page_title']; ?></a></li>
        </ul>
      </div>


      <div class="row">
         <div class="col-md-12">
            <div class="tile">
               <div class="tile-body">
                <div class="table-responsive">
                   <table class="table table-hover table-bordered" id="tableClientes">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- consumir la api en ajax -->
                    </tbody>
                   </table>
                </div>
               </div>
            </div>
         </div>
      
      </div>


</main> 


<?php  footerAdmin($data); ?> 