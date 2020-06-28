<?php

class reservation {
  public $idreservation;
  public $datereservation;
  public $etasreservaiton;
  public $idcircuit;
  public $idbene;
  public $idclient;



  public function __construct($tab) {
      $this->idreservation = $tab["IdReservation"];
      $this->datereservation = $tab["DateReservation"];
      $this->etasreservation = $tab["EtatReservation"];
      $this->idcircuit = $tab["IdCircuit"];
      $this->idbene = $tab["IdBene"];
      $this->idcliebt = $tab["IdClient"];
  }
//------------------------------------------
  public function getidreservation(){
      return $this->idreservation;
  }

  public function setidreservation(){

  }
//------------------------------------------
  public function getdatereservation(){
    return $this->datereservation;
  }

  public function setdatereservation(){

  }
//------------------------------------------
  public function getetasreservation(){
      return $this->etasreservation;
  }

  public function setetasreservation(){

  }
//------------------------------------------
  public function getidcircuit(){
    return $this->idcircuit;
  }

  public function setidcircuit(){

  }
//------------------------------------------
  public function getidbene(){
    return $this->idcidbene;
  }

  public function setidbene(){

  }

}

 ?>
