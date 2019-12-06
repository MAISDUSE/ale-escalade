<?php
<<<<<<< HEAD
class Contact {                 //Dans la BD
  private int $id;              //ID
  private string $nom;          //Nom
  private string $prenom;       //Prenom
  private string $adresse;      //Adresse
  private string $numTel;       //NumTel
  private string $adresseMail;  //Mail
=======
class Contact {
  private  $nom;
  private  $prenom;
  private  $adresse;
  private  $numTel;
  private  $adresseMail;
>>>>>>> 6c523a15b196cae3a11515807c68e3b278427f07

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
<<<<<<< HEAD
      assert(isset($this->numTel)||isset($this->adresseMail);

  }

  function getID(){
    return $this->id;
=======
      assert(isset($this->numTel) || isset($this->adresseMail));

>>>>>>> 6c523a15b196cae3a11515807c68e3b278427f07
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
