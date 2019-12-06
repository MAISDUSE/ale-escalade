<?php
require_once("../Model/Enum/TypeLicence.enum.php");
require_once("../Model/Enum/Genre.enum.php");
require_once("../Model/Enum/Role.enum.php");
require_once("../Model/Enum/Passeport.enum.php");


class Utilisateur{                  //Dans la base de données
  private  $numero;              //ID
  private  $licence;          //NumLicence
  private  $typeLicence; //TypeLicence
  private  $nom;              //Nom
  private  $prenom;           //Prenom
  private  $genre;             //Sex
  private  $dateNaissance;    //Naissance
  private  $adresse;          //Adresse
  private  $numTel;           //NumTel
  private  $numFix;           //NumFix
  private  $adresseMail;      //Mail
  private  $role;               //Role
  private  $codeUtilisateur;  //CodeUtilisateur
  private  $passeport;     //Passeport
  private  $contact;         //Contact


  function __construct(int $numero, string $licence, int $typeLicence,
    string $nom, string $prenom, int $genre, string $dateNaissance,
    string $adresse, string $numTel, string $numFix, string $adresseMail,
    int $role, string $codeUtilisateur, int $passeport, Contact $contact){

      if(isset($numero)){
        $this->numero=$numero;
      }

      $this->licence=$licence;
      $this->typeLicence=$typeLicence;
      $this->nom=$nom;
      $this->prenom=$prenom;
      $this->genre=$genre;
      $this->dateNaissance=$dateNaissance;
      $this->adresse=$adresse;
      $this->numTel=$numTel;
      $this->numFix=$numFix;
      $this->adresseMail=$adresseMail;
      $this->role=$role;
      $this->passeport=$passeport;

      //On vérifie si toutes les données nécéssaires sont rentrées.
      assert(isset($this->numero));
      assert(isset($this->licence));
      assert(isset($this->typeLicence));
      assert(isset($this->nom));
      assert(isset($this->prenom));
      assert(isset($this->genre));
      assert(isset($this->dateNaissance));
      assert(isset($this->adresse));
      assert(isset($this->numTel)||isset($this->adresseMail));
      assert(isset($this->role));
      assert(isset($this->passeport));
      assert(isset($this->contact));
  }

  function getNumero(){
    return $this->numero;
  }

  function getLicence(){
    return $this->licence;
  }

  function getTypeLicence(){
    return $this->$typeLicence;
  }

  function getNom(){
    return $this->nom;
  }

  function getPrenom(){
    return $this->prenom;
  }

  function getGenre(){
    return $this->genre;
  }

  function getDateNaissance(){
    return $this->dateNaissance;
  }

  function getAdresse(){
    return $this->adresse;
  }

  function getNumTel(){
    return $this->numTel;
  }

  function getNumTelFix(){
    return $this->numTelFix;
  }

  function getAdresseMail(){
    return $this->adresseMail;
  }

  function getRole(){
    return $this->role;
  }

  function getCodeUtilisateur(){
    return $this->codeUtilisateur;
  }

  function getPasseport(){
    return $this->passeport;
  }

  function getContact(){
    return $this->contact;
  }

}
 ?>
