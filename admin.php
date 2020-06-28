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

if($Admin<1){
    header("Refresh: 5; url=index.php");//redirection vers le formulaire de connexion dans 5 secondes
    echo "Il faut être Admin pour afficher cette page";
    exit(0);//on arrête l'éxécution du reste de la page avec exit, si le membre n'est pas connecté
}

?>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
  <meta name="description" content="">


  <title>Administration</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/recaptcha.css">
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



</head>
<body>

<section id='top-1'></section>


  <section class="extMenu6 menu cid-rXy0Arh5ls" once="menu" id="extMenu3-2">



    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <div class="menu-content-top">
            <div class="menu-logo">
                <div class="navbar-brand">

                    <span class="navbar-caption-wrap"><a href="index.html" class="brand-link mbr-black display-5">
                            L'agence PHP</a></span>
                </div>
            </div>
            <div class="menu-content-right">





                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-lg btn-primary-outline display-4" href="index.html#extForm21-1">

                        Nous contacter</a></div>






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

<section class="extAccordion cid-s2Kntfnp49" id="extAccordion3-5">




    <div class="container">
        <h2 class="mbr-fonts-style mbr-section-title align-center display-2">Administration</h2>
        <h3 class="mbr-fonts-style mbr-section-subtitle align-center display-5">Gérer les circuits et les lieux</h3>
        <div class="row justify-content-center pt-4">
            <div class="col-md-10 col-lg-8 content-block">
            <div class="accordion-content">
                <div id="bootstrap-accordion_13" class="panel-group accordionStyles accordion " role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <a role="button" class="collapsed panel-title" data-toggle="collapse" data-core="" href="#collapse1_13" aria-expanded="false" aria-controls="collapse1">
                                    <h4 class="mbr-fonts-style header-text display-5">Créer un nouveau circuit</h4>
                                </a>
                            </div>
                            <div id="collapse1_13" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#bootstrap-accordion_13">
                                <div class="panel-body p-4">
<section class="form" group="Form" plugins="formstyler, datepicker">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="https://mobirise.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="GvpK+jNTywRPJnWR4g8lQ6NM5+GMbFokrcifqz/1RuNSl3hiIkTTltSZPA3O/9ZfiG908dxfkmpVMKXPZcSVe9RCVbia1Rm1onzXA1vVHrZ3yIeOJ4eHT63q+skRo2KV.gQvijtag0IO8NBurOO+dJKF5Adhe5hVwLMgztUe5iE+KcNrd5gX8MsODOZF4KcPauRqdBPwpaU2DS8zwj3xCJjv6MGNanwoQDssWjEXulFpwnBau6BolMwEab5AICKhS">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Création d'un nouveau circuit</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div data-for="circuit-nom" class="col-lg-12 col-md-12 col-sm-12 form-group">
<input type="text" name="circuit-nom" placeholder="Nom circuit" data-form-field="circuit-nom" class="form-control display-7" value="" id="circuit-nom-extAccordion3-5">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
<div class="form-row">
<div class="col">
<input type="text" name="circuit-depart" placeholder="Ville départ" data-form-field="circuit-depart" class="form-control text-multiple" value="" id="circuit-depart-extAccordion3-5">
</div>
<div class="col">
<input type="text" name="circuit-arrive" placeholder="Ville arrivé" data-form-field="circuit-arrive" class="form-control text-multiple" value="" id="circuit-arrive-extAccordion3-5">
</div>
</div>
</div>
<div data-for="circuit-desc" class="col-lg-12 col-md-12 col-sm-12 form-group">
<textarea name="circuit-desc" placeholder="Description du voyage" data-form-field="circuit-desc" class="form-control display-7" id="circuit-desc-extAccordion3-5"></textarea>
</div>
<div data-for="circuit-duree" class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
<input type="number" name="circuit-duree" placeholder="Durée en jours" max="100" min="1" step="1" data-form-field="circuit-duree" class="form-control display-7" value="" id="circuit-duree-extAccordion3-5">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="circuit-prix">
<input type="number" name="circuit-prix" placeholder="Prix inscription" max="100000" min="0" step="1" data-form-field="circuit-prix" class="form-control display-7" value="" id="circuit-prix-extAccordion3-5">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Ajouter des étapes</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="select">
<select name="select" data-form-field="select" class="form-control display-7" id="select-extAccordion3-5">
<option value="Camphin-en-pévèle">Camphin-en-pévèle</option>
<option value="Second">Second</option>
<option value="Third">Third</option>
</select>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<button type="submit" class="btn btn-primary display-7">Créer</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <a role="button" class="collapsed panel-title" data-toggle="collapse" data-core="" href="#collapse2_13" aria-expanded="false" aria-controls="collapse2">
                                    <h4 class="mbr-fonts-style header-text display-5">
                                        Créer un nouveau lieu</h4>
                                </a>

                            </div>
                            <div id="collapse2_13" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#bootstrap-accordion_13">
                                <div class="panel-body p-4">
<section class="form" group="Form" plugins="formstyler, datepicker">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="https://mobirise.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="GvpK+jNTywRPJnWR4g8lQ6NM5+GMbFokrcifqz/1RuNSl3hiIkTTltSZPA3O/9ZfiG908dxfkmpVMKXPZcSVe9RCVbia1Rm1onzXA1vVHrZ3yIeOJ4eHT63q+skRo2KV.gQvijtag0IO8NBurOO+dJKF5Adhe5hVwLMgztUe5iE+KcNrd5gX8MsODOZF4KcPauRqdBPwpaU2DS8zwj3xCJjv6MGNanwoQDssWjEXulFpwnBau6BolMwEab5AICKhS">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Créer un nouveau lieu</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="lieu-nom">
<input type="text" name="lieu-nom" placeholder="Nom du lieu" data-form-field="lieu-nom" class="form-control display-7" value="">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="" data-for="lieu-ville">
<input type="text" name="lieu-ville" placeholder="Ville" data-form-field="lieu-ville" class="form-control display-7" value="">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="lieu-pays">
<input type="text" name="lieu-pays" placeholder="Pays" data-form-field="lieu-pays" class="form-control display-7" value="">
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="lieu-desc">
<textarea name="lieu-desc" placeholder="Description du lieu" data-form-field="lieu-desc" class="form-control display-7"></textarea>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="lieu-prix">
<input type="number" name="lieu-prix" placeholder="Prix de la visite" max="100" min="0" step="1" data-form-field="lieu-prix" class="form-control display-7" value="">
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<button type="submit" class="btn btn-primary display-7">Créer</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <a role="button" class="collapsed panel-title" data-toggle="collapse" data-core="" href="#collapse3_13" aria-expanded="false" aria-controls="collapse3">
                                    <h4 class="mbr-fonts-style header-text display-5">
                                        Modifier / Supprimer un circuit</h4>

                                </a>
                            </div>
                            <div id="collapse3_13" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#bootstrap-accordion_13">
                                <div class="panel-body p-4">
<section class="form" group="Form" plugins="formstyler, datepicker">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="https://mobirise.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="GvpK+jNTywRPJnWR4g8lQ6NM5+GMbFokrcifqz/1RuNSl3hiIkTTltSZPA3O/9ZfiG908dxfkmpVMKXPZcSVe9RCVbia1Rm1onzXA1vVHrZ3yIeOJ4eHT63q+skRo2KV.gQvijtag0IO8NBurOO+dJKF5Adhe5hVwLMgztUe5iE+KcNrd5gX8MsODOZF4KcPauRqdBPwpaU2DS8zwj3xCJjv6MGNanwoQDssWjEXulFpwnBau6BolMwEab5AICKhS">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Modifier / Supprimer un circuit</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12" style="">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Séléctionnez un circuit :</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="" data-for="select-circuit">
<select name="select-circuit" data-form-field="select-circuit" class="form-control display-7">
<option value="Les flandres en balande">Les flandres en balande</option>
<option value="Second">Second</option>
<option value="Third">Third</option>
</select>
</div>
<div class="col-auto">
<button type="submit" class="btn btn-primary display-7">Modifier</button>
<button type="submit" class="btn btn-danger display-7">Supprimer</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" role="tab" id="headingFour">
                                <a role="button" class="collapsed panel-title" data-toggle="collapse" data-core="" href="#collapse4_13" aria-expanded="false" aria-controls="collapse4">
                                    <h4 class="mbr-fonts-style header-text display-5">
                                        Modifier / Supprimer un lieu</h4>

                                </a>
                            </div>
                            <div id="collapse4_13" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#bootstrap-accordion_13">
                                <div class="panel-body p-4">
<section class="form" group="Form" plugins="formstyler, datepicker">


    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
<!--Formbuilder Form-->
<form action="https://mobirise.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="GvpK+jNTywRPJnWR4g8lQ6NM5+GMbFokrcifqz/1RuNSl3hiIkTTltSZPA3O/9ZfiG908dxfkmpVMKXPZcSVe9RCVbia1Rm1onzXA1vVHrZ3yIeOJ4eHT63q+skRo2KV.gQvijtag0IO8NBurOO+dJKF5Adhe5hVwLMgztUe5iE+KcNrd5gX8MsODOZF4KcPauRqdBPwpaU2DS8zwj3xCJjv6MGNanwoQDssWjEXulFpwnBau6BolMwEab5AICKhS">
<div class="form-row">
<div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
<div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
</div>
<div class="dragArea form-row">
<div class="col-lg-12 col-md-12 col-sm-12">
<h4 class="mbr-fonts-style display-5">Modifier / Supprimer un lieu</h4>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<hr>
</div>
<div class="col-lg-12 col-md-12 col-sm-12">
<p class="mbr-fonts-style display-7">Slectionnez un lieu</p>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 form-group" style="" data-for="select">
<select name="select" data-form-field="select" class="form-control display-7">
<option value="Cysoing">Cysoing</option>
<option value="Second">Second</option>
<option value="Third">Third</option>
</select>
</div>
<div class="col-auto">
<button type="submit" class="btn btn-primary display-7">Modifier</button>
</div>
</div>
</form><!--Formbuilder Form-->
</div>
        </div>
    </div>
</section>
                                </div>
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
  <script src="assets/formoid.min.js"></script>


</body>
</html>
