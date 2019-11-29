<?php
class Contact {
  private string $nom;
  private string $prenom;
  private string $adresse;
  private string $numTel;
  private string $adresseMail;

  function __construct(string $nom, string $prenom, string $adresse, string $numTel, string $adresseMail){

      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->adresse=$adresse;
      $this->numTel=$numTel;
      $this->adresseMail=$adresseMail;

      //On vérifie si toutes les données nécéssaires sont rentrées.
      assert(isset($this->nom));
      assert(isset($this->prenom));
      assert(isset($this->adresse));
      assert(isset($this->numTel)||isset($this->adresseMail);
      
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
