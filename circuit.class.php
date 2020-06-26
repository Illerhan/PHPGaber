<?php

Class Circuit{

    public $_idCircuit;
    public $_nomCircuit;
    public $_Descriptif;
    public $_VilleDepart;
    public $_PaysDepart;
    public $_VilleArrivee;
    public $_PaysArrive;
    public $_DateDepart;
    public $_NbrPlaceDispo;
    public $_Duree;
    public $_PrixInscription;

    public function __construct($tab){
      $this->_idCircuit = $tab["idCircuit"];
      $this->_nomCircuit = $tab["nomCircuit"];
      $this->_Descriptif = $tab["Descriptif"];
      $this->_VilleDepart = $tab["VilleDepart"];
    }

    public function idcircuit(){
      return $this->_idCircuit;
    }

    public function nomcircuit(){
      return $this->_nomCircuit;
    }

    public function descriptif(){
      return $this->_Descriptif;
    }

    public function villedepart(){
      return $this->_VilleDepart;
    }

    public function paysdepart(){
      return $this->_PaysDepart;
    }

}

?>
