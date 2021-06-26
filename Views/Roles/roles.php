<?php  
  
   headerAdmin($data);
   getModal('modalRoles',$data); 

?>


<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title']; ?>
             
             <!-- boton para agregar nuevo rol -->
             <button class="btn btn-success" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
          
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-users"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><?= $data['page_title']; ?></a></li>
  
        </ul>
      </div>
       

       <!-- tabla roles  -->
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableRoles">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Estado</th>
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
   
  </body>
</html>

 

<?php footerAdmin($data) ?>