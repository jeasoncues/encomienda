

<?php headerAdmin($data); ?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fas fa-th-large"></i></i> <?= $data['page_title']; ?>
          
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-users"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/reportes"><?= $data['page_title']; ?></a></li>
        </ul>
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
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body h3"><i class="fas fa-money-bill-alt"></i> Total de Ventas</div>
            <div class="row">
                <div class="col-md-6">
                  <div class="tile">
                  
                    <div class="widget-small warning coloured-icon"><i class="icon fas fa-money-bill-alt fa-3x"></i>
                      <div class="info">
                        <h4>Ventas</h4>
                           <p><b>
                           <?php
                            
                            foreach($data['totalVentas']['venta'] as $pagos){
                            
                                echo $pagos['total'];
                            
                            }
                           ?>
                           </b></p> 
                      </div>
                    </div>
                    
                  </div>
              </div>
            <br>
          
           
              
              <a href="<?= base_url(); ?>/encomiendas">
                <button class="btn btn-warning"><i class="fas fa-eye"></i> Ver</button>
              </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <img src="<?= media(); ?>/images/salary.svg" alt="moni" height="200px">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body h3"><i class="fas fa-money-bill-alt"></i>  Ventas: <?= $data['pagoDia']['dia'].' / '.$data['pagoDia']['mes'].' / '. $data['pagoDia']['anio'] ?></div>
            <div class="row">
                <div class="col-md-6">
                  <div class="tile">
                  
                    <div class="widget-small primary coloured-icon"><i class="icon fas fa-money-bill-alt fa-3x"></i>
                      <div class="info">
                        <h4>Ventas del <?= $data['pagoDia']['dia'] ?></h4>
                           <p><b>
                           <?php
                            
                            foreach($data['pagoDia']['dias'] as $pagos){
                            
                                echo $pagos['total'];
                            
                            }
                           ?>
                           </b></p> 
                      </div>
                    </div>
                    
                  </div>
              </div>
            <br>
          
            </div>
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body h3"><i class="fas fa-portrait"></i> Estadistica de Clientes</div>
            <div class="row">
                <div class="col-md-6">
                  <div class="tile">
                    <a href="<?= base_url(); ?>/roles" class="linkw">
                    <div class="widget-small primary"><i class="icon fas fa-users"></i>
                      <div class="info">
                        <h4>CLIENTES</h4>
                           <p><b><?= $data['clientes']?></b></p> 
                      </div>
                    </div>
                    </a> 
                  </div>
              </div>
            <br>
              <a href="<?= base_url(); ?>/comprobantes/generarComprobante" target="_blank">
                <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> Reporte Clientes </button>&nbsp;&nbsp;
              </a>
           
              
              <a href="<?= base_url(); ?>/clientes">
                <button class="btn btn-warning"><i class="fas fa-eye"></i> Ver Clientes</button>
              </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <img src="<?= media(); ?>/images/objetivo.svg" alt="moni" height="200px">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Últimos vehiculos</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Placa</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //si existen vehiculos
                  if(count($data['ultimosvehiculos']) > 0){
                     foreach ($data['ultimosvehiculos'] as $vehiculos) {
                ?>
                <tr>
                  <td><?= $vehiculos['idvehiculo'] ?></td>
                  <td><?= $vehiculos['placa'] ?></td>
                  <td><?php 
                          if($vehiculos['estado'] == 1){
                             echo 'Activo';
                           
                           }else{
                             echo 'Inactivo';
                           }
                  ?>
                  </td>
         
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
            </table>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body h3"><i class="fas fa-portrait"></i> Estadistica de Conductores</div>
            <div class="row">
                <div class="col-md-6">
                  <div class="tile">
                   
                    <div class="widget-small danger"><i class="icon fas fa-car-alt fa-3x"></i>
                      <div class="info">
                        <h4>conductores</h4>
                           <p><b><?= $data['conductores']?></b></p> 
                      </div>
                    </div>
                   
                  </div>
              </div>
            <br>
              <a href="<?= base_url(); ?>/comprobantes/generarComprobanteConductores" target="_blank">
                <button class="btn btn-danger"><i class="fas fa-file-pdf"></i> Reporte Conductores </button>&nbsp;&nbsp;
              </a>
           
              
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <img src="<?= media(); ?>/images/conductor.svg" alt="moni" height="200px">
            </div>
          </div>
        </div>
      </div>

        <div class="row">
        <div class="col-md-6">
           <div class="tile">
            <div class="tile-body h5"><i class="fas fa-money-bill-alt"></i> Tipo Pago</div>
            
              <div class="d-flex">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-check">
                <input class="form-check-input" type="radio"  checked>
                <label class="form-check-label" for="efectivo">
                  1. Efectivo
                </label>
              </div>
         &nbsp;&nbsp; &nbsp;&nbsp;
              <div class="form-check">
                <input class="form-check-input" type="radio" >
                <label class="form-check-label" for="tarjeta">
                  2. Tarjeta
                </label>
              </div>
              </div>
              <div id="pagosMesAnio"></div>
           </div>
        </div>

        <div class="col-md-6">
           <div class="tile">
           <div class="tile-body h5"><i class="fas fa-money-bill-alt"></i> Ventas, mes <?= $data['pagoMes']['mes'].' '.$data['pagoMes']['anio'] ?></div>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <img src="<?= media(); ?>/images/caja.svg" alt="moni" height="100px"> <br><br><br> <br><br>
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
      </div>
      
     
        

      </div>
</main> 

<?php footerAdmin($data); ?>

<script>
  Highcharts.chart('pagosMesAnio', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Ventas por tipo pago, <?= $data['pagoMes']['mes'].' '.$data['pagoMes']['anio'] ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    // LO QUE SE MUESTRA EN GRAFICO
    series: [{
        name: 'Porcentaje',
        colorByPoint: true,
        data: [
          <?php 
            foreach($data['pagoMes']['tipospago'] as $pagos){
              echo "{name:'".
                     
                     $pagos['tipopago']."',
                     y:".$pagos['total']."},";
            }
          ?>
         ]
    }]
  });

 

</script>