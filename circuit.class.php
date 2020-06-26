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
      $this->_idCircuit = $tab["IdCircuit"];
      $this->_nomCircuit = $tab["nomCircuit"];
      $this->_Descriptif = $tab["Descriptif"];
      $this->_VilleDepart = $tab["VilleDepart"];
      $this->_PaysDepart = $tab["PaysDepart"];
      $this->_VilleArrivee = $tab["VilleArrivee"];
      $this->_PaysArrive = $tab["PaysArrive"];
      $this->_DateDepart = $tab["DateDepart"];
      $this->_NbrPlaceDispo = $tab["NbrPlaceDispo"];
      $this->_Duree = $tab["Duree"];
      $this->_PrixInscription= $tab["PrixInscription"];
    }

    //----------------------------------
    public function getidcircuit(){
      return $this->_idCircuit;
    }

    //----------------------------------
    public function getnomcircuit(){
      return $this->_nomCircuit;
    }

    //----------------------------------
    public function getdescriptif(){
      return $this->_Descriptif;
    }

    //----------------------------------
    public function getvilledepart(){
      return $this->_VilleDepart;
    }

    //----------------------------------
    public function getpaysdepart(){
      return $this->_PaysDepart;
    }

    //----------------------------------
    public function getvillearrivee(){
      return $this->_VilleArrivee;
    }

    //----------------------------------
    public function getpaysarrive(){
      return $this->_PaysArrive;
    }

    //----------------------------------
    public function getdatedepart(){
      return $this->_DateDepart;
    }

    //----------------------------------
    public function getnbrplacedispo(){
      return $this->_NbrPlaceDispo;
    }

    //----------------------------------
    public function getduree(){
      return $this->_Duree;
    }

    //----------------------------------
    public function getprixinscription(){
      return $this->_PrixInscription;
    }

}

?>
