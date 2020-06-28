    <?php
    require 'database/BDConnection.php';
    require 'class/circuit.class.php';

    $bdd=databaseconnexion();

    session_start();
    //si une session est déjà "isset" avec ce visiteur, on l'informe:
    if(isset($_SESSION['Mail'])){
        echo "<center>Vous êtes déjà connecté, vous pouvez accéder à l'espace membre en <a href='indexcandidat.php'>cliquant ici</a>.</center>";
    } else {
        //si le formulaire est envoyé ("envoyé" signifie que le bouton submit est cliqué)
        if(isset($_POST['valider'])){
            //vérifie si tous les champs sont bien pris en compte:
            if(!isset($_POST['Mail'],$_POST['mdp'])){
                echo "Un des champs n'est pas reconnu.";
            } else {
                //tous les champs sont précisés, on regarde si le membre est inscrit dans la bdd:
                //d'abord il faut créer une connexion à la base de données dans laquelle on souhaite regarder:
                if(!$bdd) {
                    echo "Erreur connexion BDD";
                    //Dans ce script, je pars du principe que les erreurs ne sont pas affichées sur le site, vous pouvez donc voir qu'elle erreur est survenue avec mysqli_error(), pour cela décommentez la ligne suivante:
                    //echo "Erreur retournée: ".mysqli_error($mysqli);
                } else {
                    //on défini nos variables:
                    $Mail=htmlentities($_POST['Mail'],ENT_QUOTES,"UTF-8");//htmlentities avec ENT_QUOTES permet de sécuriser la requête pour éviter les injections SQL, UTF-8 pour dire de convertir en ce format
                    $mdp=$_POST['mdp'];
                    $req=mysqli_query($bdd,"SELECT * FROM client WHERE Email='$Mail' AND Password='$mdp'");
                    //on regarde si le membre est inscrit dans la bdd:
                    if(mysqli_num_rows($req)!=1){
                      $message='Pseudo ou mot de passe incorrect !';
                      echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
                    } else {
                        //pseudo et mot de passe sont trouvé sur une même colonne, on ouvre une session:
                        $_SESSION['Mail']=$Mail;
                        header("Refresh: 0.1; url=index.php");
                        $TraitementFini=true;//pour cacher le formulaire
                    }
                }
            }
        }
        if(!isset($TraitementFini)){//quand le membre sera connecté, on définira cette variable afin de cacher le formulaire
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
            <form action="https://mobirise.com/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="Sgtix6DTWWxyij0pU2EeWDjtYiFVXbLVPO3g+nZaz7IsjMhp7iOz2hBAEfYXuWIsvT4lbZJMlwRs1oqvFaslvOHiN1seTDxhb5M5JlcNZl+N4TneWx/41NQ1RdvrA9An.RE9lYqVZB3VddSVVkG8QdTGW0hc0x6t9tBx+lxp8ThjCG8LWxGbgaPh3byLAUE8GQBi0RQufqMSrNBslBn6fpKzhAD4SO4yVfqr0oLDJpEG2itixdUTXVId6UtoaV6lN">
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
            <input type="date" name="date" data-form-field="date" class="form-control display-7" value="2018-07-22" id="date-formbuilder-f">
            </div>
            <div data-for="email-inscription" class="col-lg-12 col-md-12 col-sm-12 form-group" style="">
            <input type="email" name="email-inscription" placeholder="Email" data-form-field="email-inscription" class="form-control display-7" value="" id="email-inscription-formbuilder-f">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" data-for="password-inscription">
            <input type="password" name="password-inscription" placeholder="Mot de passe" data-form-field="password-inscription" class="form-control display-7" required="required" value="" id="password-inscription-formbuilder-f">
            </div>
            <div class="col-auto">
            <button type="submit" class="btn btn-primary display-7">Inscription</button>
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
?>

  </body>
</html>
