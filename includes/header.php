<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHP Showcase</title>
    <!--  <link rel="icon" href="img/logo_transparent1.png" type="image/png"> -->
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous">
    <link rel='stylesheet' href='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css'>
    <link rel='stylesheet' href='http://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css'>
    <style>
      .sidenav-overlay {
      opacity: 0 !important;
      }
    </style>
  </head>
  <body>
    <div class="navbar-fixed">
      <nav class="light-blue">
        <div class="nav-wrapper container">
          <a id="logo-container" href="index.php" class="brand-logo white-text"><i class="fas fa-code"></i></a>
          <ul class="right hide-on-med-and-down">
            <!-- Add the sactive class depedning on which page the user is currently on -->
            <li class="<?php if($page == 'home') {echo 'active';}?>"><a href="index.php">Home</a></li>
            <li class="<?php if($page == 'gallery') {echo 'active';}?>"><a href="gallery.php">Gallery</a></li>
            <?php
              if (isset($_SESSION['userEmail'])) {
                echo '<li id="activeErr"><a href="errors.php">Error table</a></li>';
                echo '<li  id="activeLog"><a href="log.php">Login Logs</a></li>';
                echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
              
              }
              else {
                $activeLog;
                $activeReg;
              
                  echo '<li class="' . $activeLog . '"><a href="login.php">Login</a></li>';
                  echo '<li class="' . $activeReg . '"><a href="register.php">Register</a></li>';
              }
              ?>
          </ul>
          <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </div>
    <ul id="nav-mobile" class="sidenav">
      <li class="<?php if($page == 'home') {echo 'active';}?>"><a href="index.php">Home</a></li>
      <li class="<?php if($page == 'gallery') {echo 'active';}?>"><a href="gallery.php">Gallery</a></li>
      <?php
        if (isset($_SESSION['userEmail'])) {
          echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
        }
        else {
          $activeLog;
          $activeReg;
        
            echo '<li class="' . $activeLog . '"><a href="login.php">Login</a></li>';
            echo '<li class="' . $activeReg . '"><a href="register.php">Register</a></li>';
        }
        ?>
    </ul>