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

      public function AjoutLieu($nom, $ville, $pays, $desc, $prix){
        $bdd=databaseconnexion();
        $sql = 'INSERT INTO `lieuavisiter` (`NomLieu`, `Ville`, `Pays`, `Descriptif`, `PrixVisite`) VALUES ("'.$nom.'", "'.$ville.'", "'.$pays.'", "'.$desc.'", "'.$prix.'");';
        $req = mysqli_query($bdd, $sql);
      }

      public function ModifLieu($nom, $ville, $pays, $desc, $prix, $getnom, $getville, $getpays){
        $bdd=databaseconnexion();
        $sql2 = 'UPDATE lieuavisiter SET NomLieu="'.$nom.'",Ville="'.$ville.'",Pays="'.$pays.'",Descriptif="'.$desc.'",PrixVisite="'.$prix.'" WHERE NomLieu="'.$getnom.'" and Ville="'.$getville.'" and Pays="'.$getpays.'"';
        $req2 = mysqli_query($bdd, $sql2);

      }
      public function SupLieu($nom,$ville,$pays){
        $bdd=databaseconnexion();
        $sql2 = 'DELETE from lieuavisiter where NomLieu = "'.$nom.'" and Ville= "'.$ville.'" and Pays = "'.$pays.'" ';
        $req2 = mysqli_query($bdd, $sql2);
      }

  }

?>
