<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';
require 'class/reservation.class.php';

$bdd=databaseconnexion();

$_SESSION['ID']=1;

?>

<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
  <meta name="description" content="">


  <title>Mon compte</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


</head>
<body>

<section id='top-1'></section>

  <section class="extMenu6 menu cid-rXy0Arh5ls" once="menu" id="extMenu3-a">

    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-content-top">
            <div class="menu-logo">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a href="index.html" class="brand-link mbr-black display-5">
                            L'agence PHP</a></span>
                </div>
            </div>
            <div class="menu-content-right">
                <div class="info-widget">
                    <span class="widget-icon mbr-iconfont mbri-mobile2" style="color: rgb(59, 90, 187); fill: rgb(59, 90, 187);"></span>
                    <div class="widget-content display-4">
                        <p class="widget-title mbr-fonts-style display-4">+ 33 7 79 82 63 98</p>
                        <p class="widget-text mbr-fonts-style display-4">+ 33 7 98 70 76 89</p>
                    </div>
                </div>
                <div class="info-widget">
                    <span class="widget-icon mbr-iconfont mbri-clock" style="color: rgb(59, 90, 187); fill: rgb(59, 90, 187);"></span>
                    <div class="widget-content display-4">
                        <p class="widget-title mbr-fonts-style display-4">Lundi - Vendredi : 9:00 - 18:00</p>
                        <p class="widget-text mbr-fonts-style display-4">Samdedi - Dimanche : Fermé</p>
                    </div>
                </div>

                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-lg btn-primary-outline display-4" href="index.html#extForm21-1"> Nous contacter</a></div>

            </div>
        </div>
        <div class="menu-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown js-float-line" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="#top">
                            Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link mbr-black text-white dropdown-toggle display-4" href="#" data-toggle="dropdown-submenu" aria-expanded="true">Voyages</a>
                        <div class="dropdown-menu">
                            <a class="mbr-black text-white dropdown-item display-4" href="https://google.com" aria-expanded="false">New Item</a>
                            <a class="mbr-black text-white dropdown-item display-4" href="https://google.com" aria-expanded="false">New Item</a>
                            <a class="mbr-black text-white dropdown-item display-4" href="https://google.com" aria-expanded="false">New Item</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="https://google.fr">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="https://google.fr">
                            Inscription</a>
                    </li></ul>

            </div>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>
    </nav>
</section>

<section class="team2 cid-s32AkDTF7t" id="team2-c">




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row row-content justify-content-center">
          <h4>Mes reservations</h4>



          <?php

          $sql = 'SELECT * FROM reservation WHERE IdClient="'.$_SESSION['ID'].'"';
          $req = mysqli_query($bdd, $sql);

          if (!empty($req)) {
            while($donnees = mysqli_fetch_array($req)){
              $reserver = new reservation($donnees);

          ?>
          <section class="features7 cid-s32A9hTOsg" id="features07-b">

              <div class="container">

                  <div class="row row-content justify-content-center">


                      <div class="card p-3 col-lg-12 col-md-12">

                          <div class="card-wrapper">
                              <div class="card-img">
                                  <img src="assets/images/01.jpg" title="" alt="">
                                  <div class="card-box">

                                  </div>
                              </div>

                              <div class="content-wrapper">

                                  <div class="text-box">
                                      <div>
                                          <h4 class="card-title2 mbr-fonts-style mbr-normal align-left display-5">Numéro de reservation : <?php echo $reserver->getidreservation() ?></h4>
                                          <div class="ico-box">
                                              <span class="pr-2 mbr-iconfont mbr-iconfont-social ico2 mbri-pin"></span>
                                              <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">Date reservation : <?php echo $reserver->getdatereservation() ?></p>
                                          </div>
                                      </div>


                                  </div>
                                  <div class="p-box">
                                      <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">Numéro de circuit : <?php echo $reserver->getidcircuit() ?>
                                          <br>
                                      </p>
                                      <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">Rooms 4
                                          <br>
                                      </p>
                                  </div>

                                  <div class="ico-wrap">
                                      <div class="ico-box">
                                          <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-user"></span>
                                          <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">Etat : <?php echo $reserver->getetasreservation() ?></p>
                                      </div>



                                  </div>
                              </div>

                          </div>
                      </div>

                  </div>
              </div>
          </section>

            <?php
            }
          }
            ?>

        </div>
    </div>


</section>




  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>


</body>
</html>
