<?php
  class client {
    public $idclient;
    public $nom;
    public $prenom;
    public $datenaissance;
    public $email;
    public $password;


    public function __construct($tab) {
        $this->idclient = $tab["IdClient"];
        $this->nom = $tab["Nom"];
        $this->prenom = $tab["Prenom"];
        $this->datenaissance = $tab["DateNaissance"];
        $this->email = $tab["Email"];
        $this->password = $tab["Password"];
    }
//------------------------------------------
    public function getidclient(){
        return $this->idclient;
    }

    public function setidclient(){

    }
//------------------------------------------
    public function getnom(){
      return $this->nom;
    }

    public function setnom(){

    }

//--------------------------------------------
    public function getprenom(){
      return $this->prenom;
    }

    public function setprenom(){

    }

//--------------------------------------------
    public function getdatenaissance(){
      return $this->pays;
    }

    public function setdatenaissance(){

    }

//--------------------------------------------
    public function getemail(){
      return $this->email;
    }

    public function setemail(){

    }

//--------------------------------------------
    public function getpassword(){
      return $this->prix;
    }

    public function setpassword(){

    }

//--------------------------------------------

    public function reserver($idcircuit){
      $bdd=databaseconnexion();
      $sql = 'INSERT INTO `reservation` (`DateReservation`, `EtatReservation`, `IdCircuit`, `IdBene`, `IdClient`) VALUES ("2020-09-17", "en attente", "'.$idcircuit.'", 3, "'.$this->idclient.'");';
      $req = mysqli_query($bdd, $sql);

    }
}

  class admin extends client{

      public function CreeCircuit(){

      }

      public function SupCircuit(){

      }

      public function AjoutEtape(){

      }

      public function SupEtape(){

      }

      public function AjoutLieu(){

      }

      public function SupLieu(){

      }

  }

?>
