<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= esc($webDetail['title'] ?? 'Default Title'); ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('images/logo.png'); ?>">


    <!-- CSS FILES -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
        rel="stylesheet"> -->

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/owl.carousel.min.css'); ?>">


    <link rel="stylesheet" href="<?= base_url('css/menu.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('css/owl.theme.default.min.css'); ?>">

    <link href="<?= base_url('css/templatemo-pod-talk.css'); ?>" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    

    <!--

TemplateMo 584 Pod Talk

https://templatemo.com/tm-584-pod-talk

-->
</head>

<body>

    <main>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand me-lg-5 me-0" href="<?= base_url('home/index'); ?>">
            <img src="<?= base_url('images/logo.png'); ?>" class="logo-image img-fluid" alt="templatemo pod talk"> CLUB ACTIVITY
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto">


              




                <!-- ---------- FITUR PROFILE MENU ------------- -->
                <li class="nav-item dropdown pe-3 list-unstyled">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
             <img src="<?= base_url('images/' . (session()->get('foto') ?: 'default.png')) ?>" alt="" width="35px" height="35px" style="object-fit: cover; border-radius: 50%;">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= session()->get('username') ?? 'Guest' ?></span>
          </a>

          <?php
      if (session()->get('level')>0) {
        ?>
          <ul class="dropdown-menu dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= session()->get('username') ?></h6>
            </li>
            
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url ('home/profile')?>">
                <i class="fas fa-user"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>



          <?php if (session()->get('level') == 3 || session()->get('level') == 4 || session()->get('level') == 5) { ?>
              <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('home/user_log_activity') ?>">
                <i class="fas fa-list"></i>
                <span>User Log</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
          </li>
        <?php } ?>
        <?php if (session()->get('level') == 1) { ?>
              <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/settings') ?>">
                <i class="fas fa-cogs"></i>
                <span>Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
          </li>
        <?php } ?>


        <li>
          <a class="dropdown-item d-flex align-items-center" href="<?= base_url ('home/about')?>">
                <i class="fas fa-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
          </ul>
          <?php }
        ?>
        </li>
 <!-- ---------------- END FITUR PROFILE MENU ------------ -->
    
            </ul>

            <?php if (session()->get('level') < 1) { ?>
                <div class="ms-4">
                    <a href="<?= base_url('home/login'); ?>" class="btn custom-btn custom-border-btn">Get started</a>
                </div>
            <?php } else { ?>
                <div class="ms-4">
                    <a href="<?= base_url('logout'); ?>" class="btn custom-btn custom-border-btn">Log Out</a>
                </div>
            <?php } ?>
        </div>


        

    </div>
</nav>
