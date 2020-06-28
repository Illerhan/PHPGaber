<!DOCTYPE html>
<?php
require 'database/BDConnection.php';
require 'class/circuit.class.php';
require 'class/client.class.php';
require 'class/lieu.class.php';

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
        </div>
    </nav>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
              <div class="container">
                  <div class="row">
                      <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                        <h1>Crée Lieu</h1>
              <?php
              $sql = 'SELECT * FROM client WHERE IdClient=4';
              $req = mysqli_query($bdd, $sql);
              $donnees = mysqli_fetch_array($req);
              $admin = new Admin($donnees);

              if (!empty($_POST['nom']) and !empty($_POST['ville']) and! empty($_POST['pays'] and !empty($_POST['desc']) and!empty($_POST['prix']))) {
                $admin->ajoutlieu($_POST['nom'],$_POST['ville'],$_POST['pays'],$_POST['desc'],$_POST['prix']);
              }?>
                        <form  method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                          <div class="dragArea form-row">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
                              <br>
                              <div class="form-row">
                                <div class="col">
                                  <input type="text" name="nom" placeholder="Nom" data-form-field="circuit-depart" class="form-control text-multiple" value="" id="circuit-depart-extAccordion3-5">
                                </div>
                                <div class="col">
                                  <input type="text" name="ville" placeholder="Ville" data-form-field="circuit-arrive" class="form-control text-multiple" value="" id="circuit-arrive-extAccordion3-5">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <input type="text" name="pays" placeholder="Pays" data-form-field="circuit-depart" class="form-control text-multiple" value="" id="circuit-depart-extAccordion3-5">
                                </div>
                              </div>
                            </div>
                            <div data-for="circuit-desc" class="col-lg-12 col-md-12 col-sm-12 form-group">
                              <textarea name="desc" placeholder="Description du voyage" data-form-field="circuit-desc" class="form-control display-7" id="circuit-desc-extAccordion3-5"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="circuit-prix">
                              <input type="number" name="prix" placeholder="Prix inscription" max="100000" min="0" step="1" data-form-field="circuit-prix" class="form-control display-7" value="" id="circuit-prix-extAccordion3-5">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                              <button type="submit" class="btn btn-primary display-7">Créer</button>
                            </div>
                          </div>
                        </form><!--Formbuilder Form-->
                      </div>
                    </div>
                  </div>

                  <?php

                  $sql1 = 'SELECT * FROM lieuavisiter;';
                  $req1 = mysqli_query($bdd, $sql1);

                  if (!empty($req1)) {
                    while($donnees = mysqli_fetch_array($req1)){
                      $lieu = new lieu($donnees);
                  ?>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                            <h1>Modifier lieux</h1>
                            <form  method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
                              <div class="dragArea form-row">
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
                                  <br>
                                  <div class="form-row">
                                    <div class="col">
                                      <input type="text" value="<?= $lieu->getnom() ?>" name="nom" placeholder="<?= $lieu->getnom() ?>" data-form-field="circuit-depart" class="form-control text-multiple" value="" id="circuit-depart-extAccordion3-5">
                                    </div>
                                    <div class="col">
                                      <input type="text" value="<?= $lieu->getville() ?>"name="ville" placeholder="<?= $lieu->getville() ?>" data-form-field="circuit-arrive" class="form-control text-multiple" value="" id="circuit-arrive-extAccordion3-5">
                                    </div>
                                  </div>
                                  <div class="form-row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                      <input type="text" value="<?= $lieu->getpays() ?>"name="pays" placeholder="<?= $lieu->getpays() ?>" data-form-field="circuit-depart" class="form-control text-multiple" value="" id="circuit-depart-extAccordion3-5">
                                    </div>
                                  </div>
                                </div>
                                <div data-for="circuit-desc" class="col-lg-12 col-md-12 col-sm-12 form-group">
                                  <textarea name="desc" placeholder="<?= $lieu->getdesc() ?>" data-form-field="circuit-desc" class="form-control display-7" id="circuit-desc-extAccordion3-5"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="circuit-prix">
                                  <input type="number" name="prix" placeholder="<?= $lieu->getprix() ?>" max="100000" min="0" step="1" data-form-field="circuit-prix" class="form-control display-7" value="" id="circuit-prix-extAccordion3-5">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                  <button name="modif"type="submit" class="btn btn-primary display-7">Modifier</button>
                                  </form>

                                    <button name="sup"type="submit" class="btn btn-primary display-7">Supprimer</button>

                                  <?php
                                  if (isset ($_POST['modif'])){?>
                                  <meta http-equiv="refresh" content="0.1;url=lieuModif.php?nom=<?= $lieu->getnom()?>&amp;ville=<?= $lieu->getville()?>&amp;pays=<?= $lieu->getpays()?>" />
                                <?php } ?>
                                <?php
                                  if (isset ($_POST['sup'])){
                                    $admin->SupLieu($_POST['nom'],$_POST['ville'],$_POST['pays']);
                                    ?>
                                    <meta http-equiv="refresh" content="0.1;url=lieuAdmin.php"/>

                                <?php   } ?>
                                </div>
                              </div>

                          </div>
                          <?php
                          }
                        }
                          ?>
                        </div>
                      </div>
