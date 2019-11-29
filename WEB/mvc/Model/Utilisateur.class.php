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
    
}

 ?>
