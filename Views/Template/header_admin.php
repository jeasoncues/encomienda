<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Sistema de Encomiendas de la empresa Rosa Yolanda.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Jeason Cueva">
    <meta name="theme-color" content="#283940">
    <title><?= $data['page_tag']; ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" href="<?= media(); ?>/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="shortcut icon" href="<?= media(); ?>/images/icon.svg" type="image/x-icon">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  </head>
  <body class="app sidebar-mini dark-theme">
    <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo" href="<?php echo base_url(); ?>/dashboard">
        <img src="<?=  media(); ?>/images/icon.svg" alt="logo" style="width:50px;">
      </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><i class="fas fa-bars"></i></a>
      <!-- Navbar Right Menu-->

      <ul class="app-nav">
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fas fa-cog"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" id="dark"><i class="fas fa-moon"></i> Modo Oscuro</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </header>


    <?php require_once ("nav_admin.php"); ?>