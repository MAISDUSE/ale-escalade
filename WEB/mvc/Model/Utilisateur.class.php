<?php
include ("../Model/Enum/TypeLicence.enum.php");

class Utilisateur{
  private int $numero;
  private string $licence;
  private TypeLicence $typeLicence;
  private string $nom;
  private string $prenom;
  private Genre $genre;
  private string $dateNaissance;
  private string $adresse;
  private string $numTel;
  private string $numFix;
  private string $adresseMail;
  private Role $role;
  private string $codeUtilisateur;
  private Passeport $passeport;
}

function __construct(int $numero, string $licence, TypeLicence $typeLicence, string $nom, string $prenom, Genre $genre, string $dateNaissance,
  string $adresse, string $numTel, string $numFix, string $adresseMail, Role $role, string $codeUtilisateur, Passeport $passeport){

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

}

 ?>
