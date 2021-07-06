<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jeason Cueva Espinoza">

    <!-- Icono de la web-->
    <link rel="shortcut icon" href="<?= media(); ?>/images/icon.svg" type="image/x-icon">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">

    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <title><?= $data['page_tag']; ?></title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    

    <section class="login-content">
      <div class="login-box">
         
        <!-- loading -->
        <div id="divLoading">
         <div>
           <img src="<?= media(); ?>/images/loading.svg" alt="loading">
         </div>
        </div>

          <form class="login-form" name="formLogin" id="formLogin" action="">
            <div class="text-center">
              <img src="<?= media(); ?>/images/icon.svg" height="100px"  width="100">
            </div>
            <br>
      
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Iniciar Sesión</h3>
            
            <div class="form-group">
              <label class="control-label">Usuario</label>
              <input id="txtEmail" name="txtEmail" class="form-control" type="email" placeholder="Correo electrónico" autofocus>
            </div>
            <div class="form-group">
              <!-- <div class="form-row">
                <div class="col">
                  <label for="password">Contraseña</label>
                  <input id="txtPassword" name="txtPassword" class="form-control " type="password" placeholder="Contraseña">
                </div> -->
                
              <div class="wrapp-input">
                <span class="icon-eye">
                  <i class="fas fa-eye-slash"></i>
                </span>
                <label for="password">Contraseña</label>
                <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Contraseña">
              </div>
            </div>
           
            <div id="alertLogin" class="text-center"></div>
            <div class="form-group btn-container">
              <button type="submit" class="btn btn-success btn-block"> Iniciar Sesión</button>
            </div>
            <hr>
          </form>
          <!--Formulario para cuando le des click en olvidaste la contraseña-->
          <form id="formRecetPass" name="formRecetPass" class="forget-form" action="">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>¿Olvidaste tu contraseña?</h3>
            <div class="form-group">
              <label class="control-label">Correo electrónico</label>
              <input id="txtEmailReset" name="txtEmailReset" class="form-control" type="email" placeholder="Correo electrónico">
            </div>
            <div class="form-group btn-container">
              <button type="submit" class="btn btn-success btn-block">Enviar</button>
            </div>
            <div class="form-group mt-3">
              <p class="semibold-text mb-0 text-center"><a href="#" data-toggle="flip"> Iniciar Sesion</a></p>
            </div>
          </form>
      </div>

    </section>
    
    <script>
        const base_url = "<?= base_url(); ?>";

        const iconEye =  document.querySelector(".icon-eye");
        var tipo =  document.querySelector("#txtPassword");

        iconEye.addEventListener("click", function(){
          const icon = this.querySelector("i");
          console.log("cloick");
           if( tipo.type == 'password'){
             tipo.type  = "text";
             icon.classList.remove("fa-eye-slash");
             icon.classList.add("fa-eye");
           }else{
            tipo.type  = 'password';
            icon.classList.remove("fa-eye");
             icon.classList.add("fa-eye-slash");
           }
        });
    </script>
    

    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>

    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
    <script src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>

    <!--Validacion para el js del login-->
    <script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>

    
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
  </body>
</html>