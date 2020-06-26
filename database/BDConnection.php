<?php

function databaseconnexion(){
  $db = new PDO('mysql:host=localhost:3308; dbname=pbdo', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  return $db;
}

?>
