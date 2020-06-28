<?php

session_start();

unset($_SESSION['Mail']);//unset() détruit une variable, si vous enregistrez aussi l'id du membre (par exemple) vous pouvez comme avec isset(), mettre plusieurs variables séparés par une virgule:
//unset($_SESSION['pseudo'],$_SESSION['id']);

header("Refresh: 1; url=index.php");//redirection vers le formulaire de connexion dans 5 secondes
echo "Vous avez été correctement déconnecté du site.<i>Redirection en cours, vers la page d'accueil...</i>";

?>
