<?php
  class Etape {
    public $idcircuit;
    public $ordre;
    public $date;
    public $duree;
    public $nom;
    public $ville;
    public $pays;


    public function __construct($tab) {
        $this->idCircuit = $tab["IdCircuit"];
        $this->ordre = $tab["Ordre"];
        $this->date = $tab["DateEtape"];
        $this->duree = $tab["Duree"];
        $this->nom = $tab["NomLieu"];
        $this->ville = $tab["Ville"];
        $this->pays = $tab["Pays"];
    }
    //--------------------------------------------
        public function getidcircuit(){
          return $this->description;
        }

        public function setidcircuit(){

        }

    //--------------------------------------------
        public function getordre(){
          return $this->ordre;
        }

        public function setordre(){

        }

    //--------------------------------------------
        public function getdate(){
          return $this->date;
        }

        public function setdate(){

        }

    //--------------------------------------------
        public function getduree(){
          return $this->duree;
        }

        public function setprix(){

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


}

?>
