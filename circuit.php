<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';
require 'class/client.class.php';

$bdd=databaseconnexion();

?>

<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
  <meta name="description" content="">


  <title>Circuit</title>
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



          <?php

          $sql = 'SELECT c.IdCircuit, Descriptif, VilleDepart, PaysDepart, VilleArrivee, PaysArrivee, DateDepart, NbrPlaceDispo, c.Duree, PrixInscription, count(e.IdCircuit) as NbrEtape from circuit c, etape e where c.IdCircuit= e.IdCircuit and c.IdCircuit="'.$_GET['idcircuit'].'"';
          $req = mysqli_query($bdd, $sql);

          if (!empty($req)) {
            while($donnees = mysqli_fetch_array($req)){
              $circuit = new Circuit($donnees);

          ?>

            <div class="card py-4 col-md-12">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="assets/images/face1.jpg" title="">
                    </div>
                    <div class="card-box">
                        <div class="text-box">
                            <h4 class="card-title mbr-fonts-style mbr-normal display-5"><?php echo 'Circuit N° : '.$circuit->getIdcircuit() ?></h4>
                            <p class="mbr-text mbr-fonts-style status mbr-normal display-4">
                                <?php echo $circuit->getvilledepart() .' '. $circuit->getpaysdepart() ?> - <?php echo $circuit->getvillearrivee() .' '. $circuit->getpaysarrive() ?></p>

                            <p class="mbr-text mbr-fonts-style mbr-normal display-4">
                                <?php echo $circuit->getdescriptif() ?></p>
                        </div>
                        <div class="ico-wrap">
                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social mbri-calendar"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?php echo $circuit->getdatedepart() ?></p>
                            </div>

                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social mbri-letter"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?php echo $circuit->getnbrplacedispo() ?></p>
                            </div>

                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social mbri-letter"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?php echo $circuit->getduree() ?></p>
                            </div>

                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social mbri-cash"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?php echo $circuit->getprixinscription() ?></p>
                            </div>
                            <?php
                              $sql = 'SELECT * FROM client WHERE IdClient=1';
                              $req = mysqli_query($bdd, $sql);
                              $donnees = mysqli_fetch_array($req);
                              $client = new client($donnees);

                              if (!empty($_POST["reservation"])) {
                                $client->reserver($circuit->getIdcircuit());
                                ?>
                            <meta http-equiv="refresh" content="0.1;url=reservation.php" />
                            <?php
                              }
                              ?>

                            <form  method="post">
                              <input name="reservation" type="submit" value="Réservation">
                            </form>
                        </div>
                    </div>
                </div>


            </div>

            <?php
            }
          }
            ?>

        </div>
    </div>


</section>

<section class="features7 cid-s32A9hTOsg" id="features07-b">

    <div class="container">

        <div class="row row-content justify-content-center">


            <div class="card p-3 col-lg-12 col-md-12">

                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="assets/images/01.jpg" title="" alt="">
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style mbr-white mbr-bold display-7">$420,000
                                <br>$734 / sq m</h4>

                            <div class="mbr-iconfont mbr-iconfont-social icobig mbri-star" media-simple="true"></div>

                        </div>
                    </div>

                    <div class="content-wrapper">

                        <div class="text-box">
                            <div>
                                <h4 class="card-title2 mbr-fonts-style mbr-normal align-left display-5">Summer Apartment</h4>
                                <div class="ico-box">
                                    <span class="pr-2 mbr-iconfont mbr-iconfont-social ico2 mbri-pin"></span>
                                    <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">New York, &nbsp;Willis Avenue</p>
                                </div>
                            </div>

                            <div class="mbr-section-btn">
                                <a onclick="" href="#" class="btn btn-primary-outline display-4">
                                    Details</a>
                            </div>


                        </div>
                        <div class="p-box">
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">700 sq m
                                <br>
                            </p>
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">Rooms 4
                                <br>
                            </p>
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">2 Bedrooms
                                <br>
                            </p>
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">2 Bathrooms
                                <br>
                            </p>
                        </div>

                        <div class="ico-wrap">
                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-user"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">Tom Wilson</p>
                            </div>

                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-calendar"></span>
                                <p class="mbr-text pr-2 mbr-fonts-style phone mbr-normal display-4">23.10.18</p>
                            </div>



                        </div>
                    </div>

                </div>
            </div>

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
