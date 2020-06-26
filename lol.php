<?php
require 'database/BDConnection.php';
require 'circuit.class.php';

$db=databaseconnexion();

$request = $db->query('SELECT idCircuit, nomCircuit, Descriptif, VilleDepart FROM circuit');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
  // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.

  var_dump($donnees);
  $circuit = new Circuit($donnees);


  echo $circuit->idcircuit(), ' 2 ', $circuit->nomcircuit(), ' a ', $circuit->descriptif(), ' de force, ', $circuit->villedepart();
}
?>
