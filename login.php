    <?php
    require 'database/BDConnection.php';
    require 'class/circuit.class.php';

    $bdd=databaseconnexion();

    session_start();
    if(isset($_SESSION['Mail'])){
        echo "<center>Vous êtes déjà connecté, vous pouvez accéder à l'espace membre en <a href='indexcandidat.php'>cliquant ici</a>.</center>";
    } else {
        if(isset($_POST['valider'])){
            if(!isset($_POST['Mail'],$_POST['mdp'])){
                echo "Un des champs n'est pas reconnu.";
            } else {
                if(!$bdd) {
                    echo "Erreur connexion BDD";
                } else {
                    $Mail=htmlentities($_POST['Mail'],ENT_QUOTES,"UTF-8");
                    $mdp=$_POST['mdp'];
                    $req=mysqli_query($bdd,"SELECT * FROM client WHERE Email='$Mail' AND Password='$mdp'");

                    if(mysqli_num_rows($req)!=1){
                      $message='Pseudo ou mot de passe incorrect !';
                      echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                    } else {

                        $_SESSION['Mail']=$Mail;
                        header("Refresh: 0.1; url=index.php");
                        $TraitementFini=true;
                    }
                }
            }
        }
        if(!isset($TraitementFini)){




          if(isset($_POST['inscrire'])){
              //vérifie si tous les champs sont bien  pris en compte:
              //on peut combiner isset() pour valider plusieurs champs à la fois
              if(!isset($_POST['nom'],$_POST['prenom'],$_POST['date-naissance'],$_POST['mail-inscription'],$_POST['password-inscription'])){
                  echo "Un des champs n'est pas reconnu.";
              } else {
                          //on vérifie que l'adresse est correcte:
                          if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,30}$#i",$_POST['mail-inscription'])){
                              //cette preg_match est un petit peu complexe, je vous invite à regarder l'explication détaillée sur mon site c2script.com
                              echo "L'adresse mail est incorrecte.";
                              //normalement l'input type="email" vérifie que l'adresse mail soit correcte avant d'envoyer le formulaire mais il faut toujours être prudent et vérifier côté serveur (ici) avant de valider définitivement
                          } else {
                              if(strlen($_POST['mail-inscription'])<7 or strlen($_POST['mail-inscription'])>50){
                                  echo "Le mail doit être d'une longueur minimum de 7 caractères et de 50 maximum.";
                              } else {
                                  if(!$bdd) {
                                      echo "Erreur connexion BDD";
                                      //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
                                      //echo "Erreur retournée: ".mysqli_error($mysqli);
                                  } else {
                                      $Nom=htmlentities($_POST['nom'],ENT_QUOTES,"UTF-8");
                                      $Prenom=htmlentities($_POST['prenom'],ENT_QUOTES,"UTF-8");
                                      $DateNai=htmlentities($_POST['date-naissance'],ENT_QUOTES,"UTF-8");
                                      $Mdp=$_POST['password-inscription'];// la fonction md5() convertie une chaine de caractères en chaine de 32 caractères d'après un algorithme PHP, cf doc
                                      $Mail=htmlentities($_POST['mail-inscription'],ENT_QUOTES,"UTF-8");
                                      if(mysqli_num_rows(mysqli_query($bdd,"SELECT * FROM client WHERE Email='$Mail'"))!=0){//si mysqli_num_rows retourne pas 0
                                          echo "Ce pseudo est déjà utilisé par un autre membre, veuillez en choisir un autre svp.";
                                      } else {
                                          //insertion du membre dans la base de données:
                                          if(mysqli_query($bdd,"INSERT INTO client SET Nom='$Nom', Prenom='$Prenom', DateNaissance='$DateNai', Email='$Mail', Password='$Mdp', Grade=0")){
                                              echo "<center>Inscrit avec succès! Vous pouvez vous connecter: <a href='login.php'>Cliquez ici</a>.</center>";
                                              $TraitementFini=true;//pour cacher le formulaire
                                          } else {
                                              echo "Une erreur est survenue, merci de réessayer ou contactez-nous si le problème persiste.";
                                              //echo "Erreur retournée: ".mysqli_error($mysqli);
                                          }
                                      }
                                  }
                              }
                          }
                      }
                  }


          if(!isset($TraitementFini)){
                ?>

            <!DOCTYPE html>
            <html>
            <head>

              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">

              <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
              <link rel="shortcut icon" href="assets/images/fidelogo-128x125-1.png" type="image/x-icon">
              <meta name="description" content="">


              <title>Login</title>
              <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
              <link rel="stylesheet" href="assets/tether/tether.min.css">
              <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
              <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
              <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
              <link rel="stylesheet" href="assets/dropdown/css/style.css">
              <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.css">
              <link rel="stylesheet" href="assets/formstyler/jquery.formstyler.theme.css">
              <link rel="stylesheet" href="assets/datepicker/jquery.datetimepicker.min.css">
              <link rel="stylesheet" href="assets/theme/css/style.css">
              <link rel="stylesheet" href="assets/recaptcha.css">
              <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css"><link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



            </head>
            <body>

            <section id='top-1'></section>


              <section class="extMenu6 menu cid-rXy0Arh5ls" once="menu" id="extMenu3-d">



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

            <section class="form cid-s3c8iZfvax" id="formbuilder-e">

                <br><br><br><br><br><br>
                <!-- Login Form -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
            <!--Formbuilder Form-->
            <form action="login.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="hGHZvj8PSr9Hlt96Aq3JlOoCufnQMUkGftnOc9st8zbOXbWC7PlCTRR2zSXccHZe5VODG+GrrozWLhQbhjsowrpEqjQqz7O1rBkJ0dgUkHoQ+pxwzUBcMLABGh9Qz5Y8.F4CbPNoLe3kvQMvQ0SN3UKRqufrTzguSkHDiwXioSDXi0IBuv4/t/E6srB1J0XV6jflms0C3GEJDEJ+9kAerqR4ADAyiVwwEkRUcdbR5iW5r4UZ1CSxXkg6Peu3NohE2">
            <div class="form-row">
            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Connexion en cours</div>
            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
            </div>
            <div class="dragArea form-row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <h4 class="mbr-fonts-style display-5">Vous connecter</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <hr>
            </div>
            <div data-for="email" class="col-lg-12 col-md-12 col-sm-12 form-group">
            <input type="email" name="Mail" placeholder="Email" data-form-field="email" class="form-control display-7" required="required" value="" id="email-formbuilder-e">
            </div>
            <div data-for="password" class="col-lg-12 col-md-12 col-sm-12 form-group">
            <input type="password" name="mdp" placeholder="Mot de passe" data-form-field="password" class="form-control display-7" required="required" value="" id="password-formbuilder-e">
            </div>
            <div class="col-auto">
            <button name="valider" type="submit" class="btn btn-primary display-7">Connexion</button>
            </div>
            </div>
            </form><!--Formbuilder Form-->
            <br><br>
            </div>
                    </div>
                </div>
            </section>

            <section class="form cid-s3c8CHl83G" id="formbuilder-f">


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
            <!--Formbuilder Form-->
            <form action="login.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
            <div class="form-row">
            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some problem!</div>
            </div>
            <div class="dragArea form-row">
            <div class="col-lg-12 col-md-12 col-sm-12">
            <h4 class="mbr-fonts-style display-5">Pas encore de compte ? S'inscrire</h4>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
            <hr>
            </div>
            <div data-for="nom" class="col-lg-12 col-md-12 col-sm-12 form-group">
            <input type="text" name="nom" placeholder="Nom" data-form-field="nom" class="form-control display-7" required="required" value="" id="nom-formbuilder-f">
            </div>
            <div data-for="prenom" class="col-lg-12 col-md-12 col-sm-12 form-group">
            <input type="text" name="prenom" placeholder="Prenom" data-form-field="prenom" class="form-control display-7" required="required" value="" id="prenom-formbuilder-f">
            </div>
            <div data-for="date" class="col-lg-12 col-md-12 col-sm-12 form-group">
            <input type="date" name="date-naissance" data-form-field="date" class="form-control display-7" value="2018-07-22" id="date-formbuilder-f">
            </div>
            <div data-for="email-inscription" class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
            <input type="email" name="mail-inscription" placeholder="Email" data-form-field="email-inscription" class="form-control display-7" value="" id="email-inscription-formbuilder-f">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="password-inscription">
            <input type="password" name="password-inscription" placeholder="Mot de passe" data-form-field="password-inscription" class="form-control display-7" required="required" value="" id="password-inscription-formbuilder-f">
            </div>
            <div class="col-auto">
            <button name="inscrire" type="submit" class="btn btn-primary display-7">Inscription</button>
            </div>
            </div>
            </form><!--Formbuilder Form-->
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
              <script src="assets/datepicker/jquery.datetimepicker.full.js"></script>
              <script src="assets/theme/js/script.js"></script>
              <script src="assets/formoid.min.js"></script>


            </body>
            </html>

    <?php
  }
}
}
?>

  </body>
</html>
