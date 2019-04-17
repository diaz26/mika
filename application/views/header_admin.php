<?php
if($this->session->userdata('is_logged_in')){
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <!-- Mirrored from demos.creative-tim.com/marketplace/black-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Nov 2018 01:29:04 GMT -->
  <!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
  <head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/img/favicon.png">
    <title>
      Dashboard Tiindo
    </title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/black-dashboard" />
    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, black dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, black design, black dashboard bootstrap 4 dashboard">
    <meta name="description" content="Black Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Black Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Black Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta itemprop="image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/93/opt_bd_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Black Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Black Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/93/opt_bd_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Black Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/black-dashboard-pro/examples/dashboard.html" />
    <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/93/opt_bd_thumbnail.jpg" />
    <meta property="og:description" content="Black Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="<?php echo base_url(); ?>assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="<?php echo base_url(); ?>assets/css/black-dashboard.mine209.css?v=1.0.0" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/swipebox.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/swiper.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>css/colorPicker.css" type="text/css"></link>
  </head>

  <body class="sidebar-mini white-content">
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
      <div class="navbar-minimize-fixed">
        <button class="minimize-sidebar btn btn-link btn-just-icon">
          <i class="tim-icons icon-align-center visible-on-sidebar-regular text-muted"></i>
          <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini text-muted"></i>
        </button>
      </div>
      <div class="sidebar" data="blue">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
      <div class="sidebar-wrapper">
        <ul class="nav">
          
          <li>
            <a data-toggle="collapse" href="#pagesExamples">
              <i class="tim-icons icon-settings"></i>
              <p>
                configurations
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li>
                  <a href="<?php echo base_url(); ?>index.php/user">
                    <i class="tim-icons icon-single-02"></i>
                    <span class="sidebar-normal"> Profile </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
                   

          <?php
          
          if($this->session->userdata('ROL')=='admin'){
            ?>
            <li>
              <a href="<?php echo base_url(); ?>index.php/email">
                <i class="tim-icons icon-wallet-43"></i>
                <p>Correos</p>
              </a>
            </li>
            <?php
          }

          if($this->session->userdata('ROL')=='admin'){
            ?>
            <li>
              <a href="<?php echo base_url(); ?>index.php/clientes">
                <i class="tim-icons icon-wallet-43"></i>
                <p>Clientes</p>
              </a>
            </li>
            <?php
          }
         
          ?>
        </ul>
      </div>
    </div>
    <div class="main-panel" data="blue">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize d-inline">
              <button class="minimize-sidebar btn btn-link btn-just-icon" rel="tooltip" data-placement="right">
                <i class="tim-icons icon-align-center visible-on-sidebar-regular"></i>
                <i class="tim-icons icon-bullet-list-67 visible-on-sidebar-mini"></i>
              </button>
            </div>
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a  >Hola,<?php echo $id=$this->session->userdata('NOMBRE'); ?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="search-bar input-group" style="margin-left: 0px;padding-left: 0px;">
                <button class="btn btn-link" data-toggle="modal" data-target="#notifyModal"><i class="tim-icons icon-bell-55"></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="<?php echo base_url(); ?>index.php/login/session_dest" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="<?php echo base_url();?><?php echo $this->session->userdata('url_img'); ?>" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link">
                    <a href="<?php echo base_url(); ?>index.php/user/" class="nav-item dropdown-item">Profile</a>
                  </li>
                  <li class="nav-link">
                    <a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a>
                  </li>
                  <li class="dropdown-divider"></li>
                  <li class="nav-link">
                    <a href="<?php echo base_url(); ?>index.php/login/session_dest" class="nav-item dropdown-item">Log out</a>
                  </li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal modal-search fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              Acá deben ir las notificaciones
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <?php
    }else {
      redirect("".base_url()."index.php/login/");
    }
    ?>
