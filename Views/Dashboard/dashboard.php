
<!--Requerimos el header-->
<?php  headerAdmin($data);
?>
<!--Cuerpo de la Pagina-->
     
    <main class="app-content">
    
      <div class="app-title">
        <div>
          <h1><i class=""></i> <?= $data['page_title'] ?> </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><?= $data['page_title'] ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">¡Bienvenido <?= $_SESSION['userData']['nombres'] ?> a una nueva era en la plataforma digital!</div>
          </div>
        </div>
      </div>
      
      </div>
     
     
      <div class="row">
        <div class="col-md-6 col-lg-3">
         <a href="<?= base_url(); ?>/roles" class="linkw">
          <div class="widget-small primary"><i class="icon fas fa-user-tag"></i>
            <div class="info">
              <h4>Roles</h4>
              <p><b><?= $data['roles']?></b></p>
            </div>
          </div>
          </a>
        </div>


        <div class="col-md-6 col-lg-3">
         <a href="<?= base_url(); ?>/usuarios" class="linkw">
          <div class="widget-small info"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Usuarios</h4>
              <p><b><?= $data['usuarios']; ?></b></p>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-3">
         <a href="<?= base_url(); ?>/vehiculos" class="linkw">
          <div class="widget-small danger"><i class="icon fas fa-car-alt fa-3x"></i>  
            <div class="info">
              <h4>Vehiculos</h4>
              <p><b><?= $data['vehiculos']; ?></b></p>
            </div>
          </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-3">
         <a href="<?= base_url(); ?>/encomiendas" class="linkw">
          <div class="widget-small warning"><i class="icon fas fa-cart-plus fa-3x"></i>
            <div class="info">
              <h4>Encomiendas</h4>
              <p><b><?= $data['encomiendas']; ?></b></p>
            </div>
          </div>
          </a>
        </div>
      </div>

        <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Últimas encomiendas</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Estado</th>
                  <th>Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //si existen encomiendas
                  if(count($data['ultimasencomiendas']) > 0){
                     foreach ($data['ultimasencomiendas'] as $encomiendas) {
                ?>
                <tr>
                  <td><?= $encomiendas['idencomienda'] ?></td>
                  <td><?= $encomiendas['nombre'] ?></td>
                  <td><?php 
                          if($encomiendas['estado'] == 1){
                             echo 'Preparada';
                           }else if($encomiendas['estado'] == 2){
                              echo 'Entregada';
                           }else{
                             echo 'Cancelada';
                           }
                  ?>
                  </td>
                  <td><?= $encomiendas['monto'] ?></td>
                  <th><a href=""><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                </tr>
                <?php }
                    } 
                ?>
               
              </tbody>
            </table>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Cliente Top</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                
                  <th>Cliente</th>
                  <th>Encomiendas</th>
                </tr>
              </thead>
              <tbody>
              
                
                <tr>
                  <td><?= $data['clientetop']['nombre'] ?></td>
                   <td><?= $data['clientetop']['total'] ?></td>
                </tr>

               
              </tbody>
            </table> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="<?= media(); ?>/images/regalo.svg" alt="report" height="285px">
          </div>
        </div>

 
      </div>
   </div>
   <div class="row">
   <div class="col-md-12">
           <div class="tile">
           <div class="tile-body h5"><i class="fas fa-money-bill-alt"></i> Ventas, mes <?= $data['pagoMes']['mes'].' '.$data['pagoMes']['anio'] ?></div>
            <br><br>
           <div class="widget-small primary coloured-icon"><i class="icon fas fa-money-bill-alt fa-3x"></i>
                <div class="info">
                   <h4>Efectivo</h4>
                        <p><b><?php
                            
                            foreach($data['pagoMes']['tipospago'] as $pagos){
                                 
                              if($pagos['tipopago'] == 1){
                                echo $pagos['total'];
                              } 

                             }
                            
                                          ?>
                        </b></p> 
                </div>
           </div>

           <div class="widget-small dark coloured-icon"><i class="icon fab fa-cc-visa fa-3x"></i>
                <div class="info">
                   <h4 class="text-dark">Tarjeta</h4>
                        <p class="text-dark"><b><?php
                            
                                  foreach($data['pagoMes']['tipospago'] as $pagos){
                                       
                                    if($pagos['tipopago'] == 2){
                                      echo $pagos['total'];
                                    } 

                                   }
                                  
                                                ?>
                                   
                                  </b></p> 
                </div>
           </div>
           </div>
   </div>
        
    </main>

       <!--Start of Tawk.to Script-->
       <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/60ce0f0d65b7290ac636d43c/1f8ieljge';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
       </script>

<!--Requerimos el footer-->
<?php footerAdmin($data); ?>
    
