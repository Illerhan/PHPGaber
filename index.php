<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';

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

<section class="header2 cid-rzN0ljTJsp" id="header2-3">


    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container">

        <h1 class="mbr-section-title mbr-normal align-left mbr-white pb-4 mbr-fonts-style display-1">Trouvez votre voyage</h1>
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-12 col-md-10 col-sm-12 align-center" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form  method="POST" class="mbr-form form-with-styler" action="index.php">

                    <div class="dragArea row">
                        <div data-for="message" class="col-lg-2 col-md-4 form-group">
                            <input name="date1" type="date" name="message" placeholder="" data-form-field="Message" class="form-control input display-7" id="message-header2-3">
                        </div>
                        <div data-for="message" class="col-lg-2 col-md-4 form-group">
                            <input name="date2" type="date" name="message" placeholder="" data-form-field="Message" class="form-control input display-7" id="message-header2-3">
                        </div>
                        <div data-for="message" class="col-lg-2 col-md-4 form-group">
                            <input name="prix" type="text" name="message" placeholder="Prix max" data-form-field="Message" class="form-control input display-7" id="message-header2-3">
                        </div>
                        <div data-for="message" class="col-lg-2 col-md-4 form-group">
                            <input name="place" type="text" name="message" placeholder="Place minim" data-form-field="Message" class="form-control input display-7" id="message-header2-3">
                        </div>
                        <div name"filtrer" class="col-auto input-group-btn"><button name="filtrer" type="submit" class="btn btn-form btn-secondary display-7">Rechercher</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="features4 cid-rzMXdfrRCn" id="features04-2">

    <div class="container">
        <h2 class="mbr-section-title pb-1 mbr-normal mbr-fonts-style align-left display-2">Nos voyages disponibles</h2>
        <div class="row row-content justify-content-center">


          <?php
          if (isset($_POST['filtrer'])) {


            $sql = 'SELECT DateDepart, Duree FROM circuit';
            $req = mysqli_query($bdd, $sql);

              while($donnees = mysqli_fetch_array($req)){
                $jour=$donnees['DateDepart'];
                $DateArrive=date('Y-m-d', strtotime($jour. ' + '. $donnees['Duree'].' days'));

                $sql2 = 'SELECT c.IdCircuit, Descriptif, VilleDepart, PaysDepart, VilleArrivee, PaysArrivee, DateDepart, NbrPlaceDispo, c.Duree, PrixInscription, count(e.IdCircuit) as NbrEtape from circuit c, etape e where c.IdCircuit= e.IdCircuit AND c.PrixInscription<"'.$_POST['prix'].'" AND c.NbrPlaceDispo>"'.$_POST['place'].'" AND c.DateDepart BETWEEN "'.$_POST['date1'].'" and "'.$_POST['date2'].'" AND "'.$_POST['date2'].'">"'.$DateArrive.'"  GROUP BY c.IdCircuit;';
                $req2 = mysqli_query($bdd, $sql2);
            } } else {


          $sql2 = 'SELECT c.IdCircuit, Descriptif, VilleDepart, PaysDepart, VilleArrivee, PaysArrivee, DateDepart, NbrPlaceDispo, c.Duree, PrixInscription, count(e.IdCircuit) as NbrEtape from circuit c, etape e where c.IdCircuit= e.IdCircuit GROUP BY c.IdCircuit;';
          $req2 = mysqli_query($bdd, $sql2); }


          if (!empty($req2)) {
            while($donnees = mysqli_fetch_array($req2)){
              $circuit = new Circuit($donnees);



          ?>
            <div class="card p-3 col-12 col-md-6 col-lg-4">

                <div class="card-wrapper">
                  <a href="circuit.php?idcircuit=<?= $circuit->getidcircuit()?>">
                    <div class="card-img">
                        <img src="assets/images/guestblogger-newyorknl-north-america-usa-newyork-times-square-yellow-cab-medium-696x464.jpg" title="" alt="">
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style mbr-white mbr-bold display-7">12 €&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;
                                <br><?= $circuit->getidcircuit()?> Jours</h4>

                            <div class="mbr-iconfont mbr-iconfont-social icobig mbri-star" media-simple="true"></div>

                        </div>
                    </div>
                    <a/>

                    <div class="text-box">
                        <h4 class="card-title2 mbr-fonts-style mbr-normal display-7"><?='Circuit N° : '. $circuit->getidcircuit() ?></h4>
                        <div class="ico-box">
                            <span class="pr-2 mbr-iconfont mbr-iconfont-social ico2 mbri-pin"></span>
                            <p class="mbr-text mbr-fonts-style phone mbr-normal display-4"><?= $circuit->getvilledepart() ?></p>
                        </div>
                    </div>
                    <div class="p-box">
                        <p class="mbr-text mbr-fonts-style mbr-normal card-text display-4"><?= $circuit->getnbretape() ?> étapes<br>
                        </p>
                        <p class="mbr-text mbr-fonts-style mbr-normal card-text display-4"><?= $circuit->getnbretape() ?> lieux à visiter&nbsp;<br>&nbsp;
                            <br>
                        </p>
                        <p class="mbr-text mbr-fonts-style mbr-normal card-text display-4"><?=$circuit->getvilledepart() ?> - <?=$circuit->getvillearrivee() ?>&nbsp;<br>
                            <br>
                        </p>
                    </div>

                    <div class="ico-wrap">
                        <div class="ico-box">
                            <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-user"></span>
                            <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">10 place(s) restantes</p>
                        </div>

                        <div class="ico-box">
                            <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-calendar"></span>
                            <p class="mbr-text pr-2 mbr-fonts-style phone mbr-normal display-4"><?= $circuit->getdatedepart() ?></p>
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


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/nav-dropdown.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid.min.js"></script>


</body>
</html>
