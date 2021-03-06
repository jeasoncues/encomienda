  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="avatar">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres'] ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']?></p>
        </div>
      </div>
      <ul class="app-menu">
 
        <li><a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
            <i class="app-menu__icon fas fa-tachometer-alt"></i></i>
            <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fas fa-chevron-circle-right"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="<?= base_url(); ?>/roles" rel="noopener"><i class="icon fas fa-chevron-circle-right"></i> Roles</a></li>
  
          </ul>
        </li>
      
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/clientes">
              <i class="app-menu__icon fa fa-user"></i>
              <span class="app-menu__label">Clientes</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/vehiculos">
                <i class="app-menu__icon fa fa-car"></i>
                <span class="app-menu__label">Vehiculos</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/encomiendas">
                <i class="app-menu__icon fa fa-shopping-cart"></i>
                <span class="app-menu__label">Encomiendas</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/reportes">
                <i class="app-menu__icon fa fa-file"></i>
                <span class="app-menu__label">Reportes</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
               <i class="app-menu__icon fa fa-sign-out"></i>
               <span class="app-menu__label">Cerrar Sesion</span>
            </a>
        </li>

      </ul>
    </aside>