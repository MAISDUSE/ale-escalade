<?php

class InscriptionEnAttente{

  private $id;
  private $nom;
  private $prenom;
  private $genre;
  private $typeAssurance;
  private $dateNaissance;
  private $adresse;
  private $numTel;
  private $mail;
  private $passeport;
  //Rubrique contact
  private $nomContact;
  private $prenomContact;
  private $numTelContact;
  private $adresseContact;
  private $mailContact;

  function __construct(int $id, string $nom, string $prenom, string $genre,
  string $typeAssurance, string $dateNaissance, string $adresse, string $numTel,
  string $mail, string $passeport, string $nomContact, string $prenomContact,
  string $numTelContact, string $adresseContact, string $mailContact)
  {
    $this->id     = $id;
    $this->nom    = $nom;
    $this->prenom = $prenom;
    if($genre == "H" || $genre == "F"){
      $this->genre = $genre;
    }
    if($typeAssurance == "RC" || $typeAssurance == "B"
      || $typeAssurance == "B+" || $typeAssurance == "B++"){
        $this->typeAssurance = $typeAssurance;
      }
    $this->dateNaissance = $dateNaissance;
    $this->adresse = $adresse;
    $this->numTel = $numTel;
    $this->mail = $mail;
    if($passeport == "Blanc" || $passeport == "Jaune" || $passeport == "Orange"
      || $passeport == "Vert" || $passeport == "Bleu" || $passeport == "RougePerf"
      || $passeport == "RougeExt" || $passeport == "Noir"){
      $this->passeport = $passeport;
    }
    //rubrique contact
    $this->nomContact = $nomContact;
    $this->prenomContact = $prenomContact;
    $this->numTelContact = $numTelContact;
    $this->adresseContact = $adresseContact;
    $this->mailContact = $mailContact;

    assert(isset($this->id));
    assert(isset($this->nom));
    assert(isset($this->prenom));
    assert(isset($this->genre));
    assert(isset($this->typeAssurance));
    assert(isset($this->dateNaissance));
    assert(isset($this->adresse));
    assert(isset($this->numTel));
    assert(isset($this->mail));
    assert(isset($this->passeport));
    //Rubrique Contact
    assert(isset($this->nomContact));
    assert(isset($this->prenomContact));
    assert(isset($this->numTelContact));
    assert(isset($this->adresseContact));
    assert(isset($this->mailContact));
  }
    function getId(){
      return $this->id;
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
    function getAssurance(){
      return $this->typeAssurance;
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
      return $this->mail;
    }
    function getPasseport(){
      return $this->passeport;
    }
    //Rubrique contact
    function getNomContact(){
      return $this->nomContact;
    }
    function getPrenomContact(){
      return $this->prenomContact;
    }
    function getNumTelContact(){
      return $this->numTelContact;
    }
    function getAdresseContact(){
      return $this->contact;
    }
    function getAdresseMailContact(){
      return $this->mailContact;
    }
}


 ?>
