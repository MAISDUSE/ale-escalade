<?php
class Contact {                 //Dans la BD
  private  $id;              //ID
  private  $nom;          //Nom
  private  $prenom;       //Prenom
  private  $adresse;      //Adresse
  private  $numTel;       //NumTel
  private  $adresseMail;  //Mail

  function __construct(int $id, string $nom, string $prenom, string $adresse, string $numTel, string $adresseMail){

      $this->id = $id;
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->adresse=$adresse;
      $this->numTel=$numTel;
      $this->adresseMail=$adresseMail;

      //On vérifie si toutes les données nécéssaires sont rentrées.
      assert(isset($this->id));
      assert(isset($this->nom));
      assert(isset($this->prenom));
      assert(isset($this->adresse));
      assert(isset($this->numTel));

  }

  function getID(){
    return $this->id;
  }

  function getNom(){
    return $this->nom;
  }

  function getPrenom(){
    return $this->prenom;
  }

  function getAdresse(){
    return $this->adresse;
  }

  function getNumTel(){
    return $this->numTel;
  }

  function getAdresseMail(){
    return $this->adresseMail;
  }

}
?>
