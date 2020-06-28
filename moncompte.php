<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';
require 'class/reservation.class.php';

$bdd=databaseconnexion();

session_start();//session_start() combiné à $_SESSION (voir en fin de traitement du formulaire) nous permettra de garder le pseudo en sauvegarde pendant qu'il est connecté, si vous voulez que sur une page, le pseudo soit (ou tout autre variable sauvegardée avec $_SESSION) soit retransmis, mettez session_start() au début de votre fichier PHP, comme ici

if(!isset($_SESSION['Mail'])){
    header("Refresh: 5; url=login.php");//redirection vers le formulaire de connexion dans 5 secondes
    echo "Vous devez vous connecter pour accéder à cette espace .<i>Redirection en cours, vers la page de connexion...</i>";
    exit(0);//on arrête l'éxécution du reste de la page avec exit, si le membre n'est pas connecté
}

$sql = 'SELECT * FROM client WHERE Email="'.$_SESSION['Mail'].'"';
$req = mysqli_query($bdd, $sql);

  while($donnees = mysqli_fetch_array($req)){
    $IdClient=$donnees['IdClient'];
    $Admin=$donnees['Grade'];
}

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
        </div>
        <div class="menu-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown js-float-line" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="index.php">
                            Accueil</a>
                    </li>

                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['Mail'])){
                         ?>
                        <a class="nav-link link mbr-black text-white display-4" href="moncompte.php">Mes reservations</a>
                        <?php
                      } else {
                         ?>
                         <a class="nav-link link mbr-black text-white display-4" href="login.php">Connexion</a>
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
                    } else {
                       ?>
                       <a class="nav-link link mbr-black text-white display-4" href="login.php">Inscription</a>
                       <?php
                       }
                        ?>
                    </li>
                    <?php
                    if($Admin>=1){
                     ?>
                     <li class="nav-item">
                    <a class="nav-link link mbr-black text-white display-4" href="admin.php">Administration</a>
                    </li>
                    <?php
                    }
                     ?>
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
          <h4>Mes reservations</h4>



          <?php

          $sql = 'SELECT * FROM reservation WHERE IdClient="'.$IdClient.'"';
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
