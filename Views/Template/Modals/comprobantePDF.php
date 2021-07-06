<!-- variables -->
<?php 
  $cliente = $data['cliente'];
  $encomienda = $data['encomienda'];

?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= media(); ?>/images/icon.svg" type="image/x-icon">
  <title>Factura</title>

  <style>
    table{
      width: 100%;
    }

    table td, table th{
      font-size: 10px;
    }

    h4{
      margin-bottom: 0px;
    }

    .text-center{
      text-align: center;
    }

    .text-right{
      text-align: right;
    }

    .wd33{
      width: 33.33%;
    }

    img{
      width: 250px;
    }

    .tbl-cliente{
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 10px;
      width: 70%;
    }

    .wd10{
      width: 10%;
    }

    .wd40{
      width: 40%;
    }


    .wd55{
      width: 55%;
    }

    .wd30{
      width: 30%;
    }

    .wd50{
       width: 50%;
    }

    .wd15{
      width: 15%;
    }

    .tbl-detalle thead th{
      padding:  5px;
      background-color: #283940;
      color: #fff;
    }

    .tbl-detalle tbody td{
      border-bottom: 1px solid #ccc;
      padding: 5px;
    }
  </style>
</head>
<body>
 
 <div class="text-center">
 <img src="<?= media(); ?>/images/rosa.png" alt="Logo">
 </div>
 <br> 
      

<div class="text-center">

           <p>Sechura Av - Moquegua 202 <br>
           Teléfono: 999 134 381 <br>
           Email: jeasoncues@gmail.com
           </p>
      
          <p>No. Encomienda <strong><?= $encomienda['idencomienda'] ?></strong><br>
          Fecha: <?= $encomienda['fechaRegistro'] ?> <br>
          <?php 
            if($encomienda['tipopago'] == 1){
          ?>
          Tipo Pago: Efectivo <br>
          <?php }else{ ?>
          Tipo Pago: Tarjeta <br>
          <?php } ?>
          </p>
</div>
 
  <br>

  <table class="tbl-cliente">
     <tbody>
       <tr>
         <td class="wd10">DNI:</td>
         <td class="wd40"><?= $cliente['dni'] ?></td>
         <td class="wd10">Teléfono</td>
         <td class="wd40"><?= $cliente['telefono']?></td>
       </tr>
       <tr>
         <td>Nombre:</td>
         <td><?= $cliente['nombres'].' '.$cliente['apellidos']?></td>
         <td>Direccion:</td>
         <td><?= $cliente['direccion']?></td>
       </tr>
     </tbody>
  </table>
   <br>
  <table class="tbl-detalle">
     <thead>
        <tr>
          <th class="wd33 text-center">Destinatario</th>
          <th class="wd10 text-center">Placa - Auto</th>
          <th class="wd33 text-center">Destino</th>
          <th class="wd10 text-center">Monto</th>
        </tr>
     </thead>
     <tbody>
     <tr>
         <td class="text-center"><?= $encomienda['destinatario']?></td>
         <td><?= $encomienda['placa']?></td>
         <td><?= $encomienda['destino']?></td>
         <td class="text-center"><?= $encomienda['monto']?></td>
       </tr>
     </tbody>
  </table>

  <div class="text-center">
    <p>Si tienes preguntas sobre tu encomienda, <br> pongase en contacto con nosotros.</p>
    <h4>¡Gracias por tu confianza!</h4>
  </div>
</body>
</html>