<?php
include ("../Model/Enum/TypeLicence.enum.php");
include ("../Model/Enum/Genre.enum.php");
include ("../Model/Enum/Role.enum.php");
include ("../Model/Enum/Passeport.enum.php");
include ("../Model/Enum/Contact.enum.php");


class Utilisateur{                  //Dans la base de données
  private int $numero;              //ID
  private string $licence;          //NumLicence
  private TypeLicence $typeLicence; //TypeLicence
  private string $nom;              //Nom
  private string $prenom;           //Prenom
  private Genre $genre;             //Sex
  private string $dateNaissance;    //Naissance
  private string $adresse;          //Adresse
  private string $numTel;           //NumTel
  private string $numFix;           //NumFix
  private string $adresseMail;      //Mail
  private Role $role;               //Role
  private string $codeUtilisateur;  //CodeUtilisateur
  private Passeport $passeport;     //Passeport
  private Contact $contact;         //Contact


  function __construct(int $numero, string $licence, TypeLicence $typeLicence, string $nom, string $prenom, Genre $genre, string $dateNaissance,
    string $adresse, string $numTel, string $numFix, string $adresseMail, Role $role, string $codeUtilisateur, Passeport $passeport, Contact $contact){

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
      $this->codeUtilisateur=$codeutilisateur;
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
      assert(isset($this->codeUtilisateur));
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
