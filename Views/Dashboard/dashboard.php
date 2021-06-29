
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
<!-- requerimos con la funcion en helpers para el footer -->
<?php footerAdmin($data); ?>


