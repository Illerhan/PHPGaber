<?php

function databaseconnexion(){
  $bdd = mysqli_connect('localhost:3308','root','','pbdo');
  mysqli_set_charset($bdd, "utf8");
  return $bdd;
}

?>
