
<?php
  class lieu {
    public $nom;
    public $ville;
    public $pays;
    public $description;
    public $prix;


    public function __construct($tab) {
        $this->nom = $tab[0];
        $this->ville = $tab[1];
        $this->pays = $tab[2];
        $this->description = $tab[3];
        $this->prix = $tab[4];
        echo 'l\'objet lieu est bien crée <br>';
    }

    public function getnom(){
      echo $this->nom;
    }
}
$test = array(1, 55, 7,5,3);
print_r($test) ;
  $lille=new lieu($test);
  $lille->test();
?>
