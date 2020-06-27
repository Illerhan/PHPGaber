
<?php
  class lieu {
    public $nom;
    public $ville;
    public $pays;
    public $description;
    public $prix;


    public function __construct($tab) {
        $this->nom = $tab["NomLieu"];
        $this->ville = $tab["Ville"];
        $this->pays = $tab["Pays"];
        $this->description = $tab["Descriptif"];
        $this->prix = $tab["PrixVisite"];
    }
//------------------------------------------
    public function getnom(){
      return $this->nom;
    }

    public function setnom(){

    }

//--------------------------------------------
    public function getville(){
      return $this->ville;
    }

    public function setville(){

    }

//--------------------------------------------
    public function getpays(){
      return $this->pays;
    }

    public function setpays(){

    }

//--------------------------------------------
    public function getdescription(){
      return $this->description;
    }

    public function setdesctiption(){

    }

//--------------------------------------------
    public function getprix(){
      return $this->prix;
    }

    public function setprix(){

    }

}

?>
