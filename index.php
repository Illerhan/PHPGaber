<?php

$bdd = new PDO('mysql:host=localhost:3308; dbname=bddvoyage', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$circuit = $bdd->query('SELECT * FROM circuit ');
$client = $bdd->query('SELECT * FROM circuit');

$tablecircuit = array();
while ($row = $circuit->fetch()) {
    array_push($tablecircuit, $row);
}
$tableclient = array();
while ($row = $client->fetch()) {
    array_push($tableclient, $row);
}

$circuit->closeCursor();

$bdd = null
?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
  <meta name="description" content="">

  <title>Accueil</title>
  <link rel="stylesheet" href="assets/web/assets/web-icons/web-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
  <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" as="style" href="assets/style/css/mbr-additional.css"><link rel="stylesheet" href="assets/style/css/mbr-additional.css" type="text/css">



</head>
<body>

<section id='top-1'></section>


  <section class="extMenu6 menu cid-rXy0Arh5ls" once="menu" id="extMenu3-0">



    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-content-top">
            <div class="menu-logo">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a href="index.php" class="brand-link mbr-black display-5">
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





                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-lg btn-primary-outline display-4" href="index.html#extForm21-1">

                        Nous contacter</a></div>






            </div>
        </div>
        <div class="menu-bottom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown js-float-line" data-app-modern-menu="true"><li class="nav-item">
                        <a class="nav-link link mbr-black text-white display-4" href="#top">
                            Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link mbr-black text-white dropdown-toggle display-4" href="https://localhost.com" data-toggle="dropdown-submenu" aria-expanded="true">Voyages</a>
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

<section class="header2 cid-rzN0ljTJsp" id="header2-3">



    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container">

        <h1 class="mbr-section-title mbr-normal align-left mbr-white pb-4 mbr-fonts-style display-1">Trouvez votre voyage</h1>
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-12 col-md-10 col-sm-12 align-center" data-form-type="formoid">
                <!---Formbuilder Form--->
                <form action="https://localhost.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Site Form"><input type="hidden" name="email" data-form-email="true" value="SW0tOrp1DNSIsi3rAG5QvSSjnDt2Tb2JKQjX4O90l4WN03t+hz8eFhb1m444Ib+b1Vqa/ugJBtGC7/LzVQg9FHNjfakyJv4Jc7DWL0TaQWd5I1SMR/0dAUSg9hEqn49y.6wSXtGluM0lvkr9kLbP+bHorkQDPqi6uVtdK3mduOez385NUSgAibiWqPKvjkdmlfFAu9kLaUfcxxtCriMK7gyxB+u1/QJRS+YvC4kvaBwzixn6LhK3n0oydrERrRfvq">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Recherche en cours...</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-lg-3 col-md-6 form-group" data-for="type">
                            <select name="type" data-form-field="Type" class="form-control display-7" placeholder="Any Type" id="type-header2-3">
                                <option value="Any Type">Pays</option>
                                <option value="Apartments">France</option>
                                <option value="Houses">Belgique</option>
                                <option value="Commercial">Allemagne</option>
                                <option value="Garages">Espagne</option>
                                <option value="Lots">Etat-Unis</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 form-group" data-for="status">
                            <select name="status" data-form-field="Status" class="form-control display-7" placeholder="Any Status" id="status-header2-3">
                                <option value="Any Status">Budget</option>
                                <option value="For Sale">-1000€</option>
                                <option value="For Rent">-2000€</option>
                                <option value="For Rent2">-3000€</option>
                                <option value="For Rent3">+3000€</option>
                            </select>
                        </div>
                        <div data-for="message" class="col-lg-4 col-md-9 form-group">
                            <input type="text" name="message" placeholder="Entre un adresse si vous souhaitez..." data-form-field="Message" class="form-control input display-7" id="message-header2-3">
                        </div>
                        <div class="col-auto input-group-btn"><button type="submit" class="btn btn-form btn-secondary display-7" href="https://google.fr">Rechercher</button></div>
                    </div>
                </form><!---Formbuilder Form--->
            </div>
        </div>
    </div>
</section>

<section class="features4 cid-rzMXdfrRCn" id="features04-2">




    <div class="container">
        <h2 class="mbr-section-title pb-1 mbr-normal mbr-fonts-style align-left display-2">Nos voyages disponibles</h2>
        <div class="row row-content justify-content-center">
            <?php  foreach ($tablecircuit as $row) {?>
            <div class="card p-3 col-12 col-md-6 col-lg-4">

                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="assets/images/guestblogger-newyorknl-north-america-usa-newyork-times-square-yellow-cab-medium-696x464.jpg" title="" alt="">
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style mbr-white mbr-bold display-7"><?php echo $row['PrixInscription']?>€ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;
                                <br><?php echo $row['Durée']?></h4>

                            <div class="mbr-iconfont mbr-iconfont-social icobig mbri-star" media-simple="true"></div>

                        </div>
                    </div>

                    <div class="text-box">
                        <h4 class="card-title2 mbr-fonts-style mbr-normal display-7"><?php echo $row['Descriptif']?></h4>
                        <div class="ico-box">
                            <span class="pr-2 mbr-iconfont mbr-iconfont-social ico2 mbri-pin"></span>
                            <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">New York, &nbsp;Willis Avenue</p>
                        </div>
                    </div>
                    <div class="p-box">
                        <p class="mbr-text mbr-fonts-style mbr-normal card-text display-4">3 étapes<br>
                        </p>
                            <br>
                        </p>
                        <p class="mbr-text mbr-fonts-style mbr-normal card-text display-4"><?php echo $row['VilleDepart'] ?> - <?php echo $row['VilleArrivee'] ?><br>
                                              <br>
                        </p>
                    </div>

                    <div class="ico-wrap">
                        <div class="ico-box">
                            <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-user"></span>
                            <p class="mbr-text mbr-fonts-style phone mbr-normal display-4">Encore <?php echo $row['NbrPlaceDispo']?> places disponibles</php>
                        </div>

                        <div class="ico-box">
                            <span class="px-2 mbr-iconfont mbr-iconfont-social ico2 mbri-calendar"></span>
                            <p class="mbr-text pr-2 mbr-fonts-style phone mbr-normal display-4">23.10.20</p>
                        </div>

                    </div>


                </div>

            </div>
            <?php }; ?>

        </div>
    </div>
</section>

<section class="features5 counters cid-rzN0s6n1UA" id="features05-5">



    <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);">
    </div>
    <div class="container">
        <div class="media-container-row">

            <div class="card p-3 col-12 col-md-6 border-r col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-globe"></span>
                </div>
                <div class="card-box">
                    <h4 class="count card-title mbr-fonts-style mbr-white mbr-bold align-center display-1">942</h4>
                    <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-5">
                        Voyage disponible</p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 border-r col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-flag"></span>
                </div>
                <div class="card-box">
                    <h4 class="count card-title mbr-fonts-style mbr-white mbr-bold align-center display-1">1476</h4>
                    <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-5">
                        Lieu à visiter</p>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 border-r col-lg-4">
                <div class="card-img pb-3">
                    <span class="mbr-iconfont mbri-user"></span>
                </div>
                <div class="card-box">
                    <h4 class="count card-title mbr-fonts-style mbr-white mbr-bold align-center display-1">164</h4>
                    <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-5">
                        Nos clients</p>
                </div>
            </div>


        </div>
    </div>
</section>

<section class="map2 cid-rzN0USyFM8" id="map2-a">



    <div class="container-fluid">

        <div class="d-flex justify-content-center">
            <div class="relative">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCy9r70T3NYf3PhvVflTo0_zdif2_IoIYs&amp;q=place_id:ChIJjTrWU_zYwkcRA-yi4iKWc04" allowfullscreen=""></iframe></div>
                <div class="block">
                    <h2 class="title mbr-fonts-style mbr-bold display-2">Notre agence</h2>
                    <div class="line"></div>
                    <p class="mbr-fonts-style mbr-text text display-7">33 rue du château de luchin&nbsp;<br>Camphin-en-pevele 59780&nbsp;<br>projetgaber@gmail.com<br>Téléphone : +33 7 79 82 63 98</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="extForm cid-rXy5O6rS10" id="extForm21-1">




    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-12 col-sm-12 align-center">
                <h2 class="title1 mbr-fonts-style mbr-bold display-5">
                    Une question ?</h2>
                <h3 class="mbr-section-subtitle mbr-fonts-style display-7">
                    Si vous avez des questions sur un voyage, une visite ou encore une étape vous pouvez nous contacter via ce formulaire ou directement par téléphone pour plus d'informations.</h3>

                <div class="ico-box">
                    <span class="pr-3 mbr-iconfont mbr-iconfont-social icon mbri-mobile2"></span>
                    <div>
                        <h4 class="mbr-fonts-style type display-7">Téléphone</h4>
                        <p class="mbr-fonts-style content display-7">
                            + 33 7 79 82 63 98 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                    </div>
                </div>


                <div class="ico-box">
                    <span class="pr-3 mbr-iconfont mbr-iconfont-social icon mbri-mobile2"></span>
                    <div>
                        <h4 class="mbr-fonts-style type display-7">S.A.V</h4>
                        <p class="mbr-fonts-style content display-7">
                            + 33 7 98 70 76 89</p>
                    </div>
                </div>


                <div class="ico-box">
                    <span class="pr-3 mbr-iconfont mbr-iconfont-social icon mbri-globe"></span>
                    <div>
                        <h4 class="mbr-fonts-style type display-7">Site web</h4>
                        <p class="mbr-fonts-style content display-7">
                            www.agencephp.com</p>
                    </div>
                </div>


                <div class="ico-box">
                    <span class="pr-3 mbr-iconfont mbr-iconfont-social icon mbri-letter"></span>
                    <div>
                        <h4 class="mbr-fonts-style type display-7">Email</h4>
                        <p class="mbr-fonts-style content display-7">
                            projetgaber@gmail.com</p>
                    </div>
                </div>


            </div>




            <div class="col-lg-7 col-md-12 col-sm-12 align-left">
                <h2 class="title2 mbr-fonts-style mbr-bold display-5">
                    Nous contacter</h2>
                <div data-form-type="formoid">
                    <!---Formbuilder Form--->
                    <form action="https://localhost.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Site Form"><input type="hidden" name="email" data-form-email="true" value="MA7jp7UAg0xNBH3WalRiduNbrTNQk/E5ZZjpJXoYw32tC0mdXm/MafE0qnPWzdSdXDSa9WmpRoHXLNr+BbShmIKIamablx+qrjQMKmjg2fYyT7L92RjZrCIywY9YO+hS.SMhWwI0HuNF5n8YGbGyH5C3y6shgCl2zHzwDjLG4k6wBzMuyq1Sz4s8kudWrzwaC5AkDXHs7+vS11fbcSI1HjQKDbK8RaF9YSCGjoU21w2m1R7/iY29r8A2KX1Ke4tVf">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Merci de nous avoir contacté !</div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            </div>
                        </div>
                        <div class="dragArea row">
                            <div class="col-md-6  form-group" data-for="name">
                                <input type="text" name="name" placeholder="Votre nom" data-form-field="Name" required="required" class="form-control display-7" id="name-extForm21-1">
                            </div>
                            <div class="col-md-6  form-group" data-for="email">
                                <input type="email" name="email" placeholder="Votre mail" data-form-field="Email" required="required" class="form-control display-7" id="email-extForm21-1">
                            </div>
                            <div data-for="phone" class="col-md-12  form-group">
                                <input type="tel" name="phone" placeholder="Sujet" data-form-field="Phone" class="form-control display-7" id="phone-extForm21-1">
                            </div>
                            <div data-for="message" class="col-md-12 form-group ">
                                <textarea name="message" placeholder="Message" data-form-field="Message" class="form-control display-7" id="message-extForm21-1"></textarea>
                            </div>
                            <div class="col-md-12 input-group-btn"><button type="submit" class="btn btn-form btn-primary display-4" href="https://google.fr">Envoyer</button></div>
                        </div>
                    </form><!---Formbuilder Form--->
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
  <script src="assets/formstyler/jquery.formstyler.js"></script>
  <script src="assets/formstyler/jquery.formstyler.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>


</body>
</html>