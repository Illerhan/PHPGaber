<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';
require 'class/client.class.php';
require 'class/etape.class.php';

$bdd=databaseconnexion();
session_start();

?>

<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
  <meta name="description" content="">


  <title>Accueil</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/recaptcha.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

</head>
<body>

<section id='top-1'></section>


  <section class="extMenu6 menu cid-rXy0Arh5ls" once="menu" id="extMenu3-0">


    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-content-top">
            <div class="menu-logo">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a href="index.html" class="brand-link mbr-black display-5"> L'agence PHP</a></span>
                </div>
            </div>

        </div>
        <div class="menu-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown js-float-line" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="/index.php">Accueil</a>
                    </li>

                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['Mail'])){
                         ?>
                        <a class="nav-link link mbr-black text-white display-4" href="moncompte.php">Mes reservations</a>
                        <?php
                        } else {
                         ?>
                         <a class="nav-link link mbr-black text-white display-4" href="login.php">Connexion/Inscription</a>
                         <?php
                         }
                          ?>
                        </li>
                        <li class="nav-item">
                        <?php
                        if(isset($_SESSION['Mail'])){
                       ?>
                      <a class="nav-link link mbr-black text-white display-4" href="logout.php">Déconnexion</a>
                        <?php
                      }
                        ?>
                    </li>
                </ul>

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

<?php

$sql = 'SELECT * FROM etape WHERE IdCircuit="'.$_GET['idcircuit'].'" ORDER BY ordre';
$req = mysqli_query($bdd, $sql);

if (!empty($req)) {
  while($donnees = mysqli_fetch_array($req)) {
    $etape = new Etape($donnees);

 ?>

<section class="features7 cid-s32A9hTOsg" id="features07-b">

    <div class="container">

        <div class="row row-content justify-content-center">


            <div class="card p-3 col-lg-12 col-md-12">

                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="assets/images/01.jpg" title="" alt="">
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style mbr-white mbr-bold display-7">
                                <br>Etape numero : <?php echo $etape->getordre() ?></h4>

                            <div class="mbr-iconfont mbr-iconfont-social icobig mbri-star" media-simple="true"></div>

                        </div>
                    </div>

                    <div class="content-wrapper">

                        <div class="text-box">
                            <div>
                                <h4 class="card-title2 mbr-fonts-style mbr-normal align-left display-5">Etape : <?php echo $etape->getnom() ?></h4>
                                <div class="ico-box">
                                    <span class="pr-2 mbr-iconfont mbr-iconfont-social ico2 mbri-pin"></span>
                                    <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?php echo $etape->getpays() ?></p>
                                </div>
                            </div>

                            <div class="mbr-section-btn">
                                <a onclick="" href="#" class="btn btn-primary-outline display-4">
                                    Details</a>
                            </div>


                        </div>
                        <div class="p-box">
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">Durée : <?php echo $etape->getduree() ?>
                                <br>
                            </p>
                            <p class="mbr-text mbr-fonts-style mbr-normal card-text display-7">Ville : <?php echo $etape->getville() ?>
                                <br>
                            </p>
                        </div>

                        <div class="ico-wrap">
                            <div class="ico-box">
                                <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-user"></span>
                                <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">Date depart : <?php echo $etape->getdate() ?></p>
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
