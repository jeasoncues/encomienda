
<!-- requerimos con la funcion en helpers para el header -->
<?php headerAdmin($data); ?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?= $data['page_title']; ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/dashboard"><?= $data['page_title']; ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">¡Bienvenidos a una nueva era digital!</div>
          </div>
        </div>
      </div>
    </main>
   
  </body>
</html>

<!-- requerimos con la funcion en helpers para el footer -->
<?php footerAdmin($data); ?>