<?php

Class Circuit{

    public $VilleDepart;
    public $VilleArrive;
    public $Description;
    public $Duree;
    public $Prix;

    public function __construct($VilleDepart){
      $this->VilleDepart = $VilleDepart;
    }

    public function afficher($VilleDepart, $VilleArrive, $Description, $Duree, $Prix){
      $this->VilleDepart = $VilleDepart;
      $this->VilleArrive = $VilleArrive;
      $this->Description = $Description;
      $this->Duree = $Duree;
      $this->Prix = $Prix;
    }

}

?>
