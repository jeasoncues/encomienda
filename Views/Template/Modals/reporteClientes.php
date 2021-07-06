<!-- variables -->
<?php 
  $cliente = $data['clientes'];


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
      font-size: 12px;
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

    .wd20{
       width: 20%;
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
 <br>   
 <div class="text-center">
 <img src="<?= media(); ?>/images/rosa.png" alt="Logo">
 </div>
 <br> 
      

<div class="text-center">

           <p>Sechura Av - Moquegua 202 <br>
           Teléfono: 999 134 381 <br>
           Email: jeasoncues@gmail.com
           </p>
      
</div>
  <br>


  <table class="tbl-detalle text-center">
     <thead>
        <tr>
          <th class="wd10 text-center">DNI</th>
          <th class="wd20 text-center">Nombres</th>
          <th class="wd20 text-center">Apellidos</th>
          <th class="wd15 text-center">Telefono</th>
          <th class="wd15 text-center">Email</th>
          <th class="wd15 text-center">Direccion</th>
        </tr>
     </thead>
     <tbody>
      <?php 
       
        foreach ($cliente as $report){
      ?>
     <tr>
         <td><?= $report['dni'] ?></td>
         <td><?= $report['nombres'] ?></td>
         <td><?= $report['apellidos'] ?></td>
         <td><?= $report['telefono'] ?></td>
         <td><?= $report['email_user'] ?></td>
         <td><?= $report['direccion'] ?></td>
       
       </tr>
       <?php  } ?>
     </tbody>
  </table>

  <div class="text-center">
    <h4>¡Generaste reporte de clientes!</h4>
  </div>
</body>
</html>