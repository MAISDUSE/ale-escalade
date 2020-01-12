<?php
require_once("../Model/Enum/TypeLicence.enum.php");
require_once("../Model/Enum/Genre.enum.php"); //Y aura surement besoin d'aucun enum
require_once("../Model/Enum/Role.enum.php");
require_once("../Model/Enum/Passeport.enum.php");


class Adherent{            //Dans la base de données
  private  $id;               //id
  private  $licence;          //Licence 1
  private  $typeLicence;      //TypeLicence 2
  private  $nom;              //Nom 3
  private  $prenom;           //Prenom 4
  private  $genre;            //Genre 5
  private  $dateNaissance;    //dateNaissance 6
  private  $adresse;          //Adresse 7
  private  $numTel;           //NumTel 8
  private  $adresseMail;      //E-Mail 9
  private  $role;             //Role 10
  private  $codeUtilisateur;  //CodeUtilisateur 11
  private  $passeport;        //Passeport 12
  private  $contact;          //Contact


  function __construct(int $id, string $licence = "NULL", string $typeLicence = "NULL",
    string $nom, string $prenom, string $genre, string $dateNaissance,
    string $adresse, string $numTel, string $adresseMail,
    string $role, string $codeUtilisateur, string $passeport, Contact $contact = null){

      /*if(isset($id)){
        $this->id=$id;
      }*/
      $this->id=$id;
      $this->licence=$licence;

      if($typeLicence=="J" || $typeLicence=="A" || $typeLicence=="F"){
        $this->typeLicence=$typeLicence;
      } else {
        $this->typeLicence="NULL";
      }

      $this->nom=$nom;
      $this->prenom=$prenom;
      if($genre=="H" || $genre=="F"){
          $this->genre=$genre;
      }
      $this->dateNaissance=$dateNaissance;
      $this->adresse=$adresse;
      $this->numTel=$numTel;
      $this->adresseMail=$adresseMail;
      if($role=="Bureau" || $role=="Entraineur" || $role=="Administrateur" || $role=="Adherent" || $role=="Mineur" || $role=="Benevole"){
        $this->role=$role;
      }
      if($passeport=="Blanc" || $passeport=="Jaune" || $passeport=="Orange" || $passeport=="Vert" || $passeport=="Bleu" || $passeport=="RougePerf" || $passeport=="RougeExt" || $passeport=="Noir"){
        $this->passeport=$passeport;
      }
      $this->contact = $contact;

      //On vérifie si toutes les données nécéssaires sont rentrées.
      assert(isset($this->id));
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

  function getId(){
    return $this->id;
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
