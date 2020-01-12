<?php
class Lieu{
  private $nom;
  private $adresse;
  private $categorie;

  public function __construct(string $nom, string $adresse, string $categorie){
    $this->nom = $nom;
    $this->adresse = $adresse;
    if($categorie="Interieur" || $categorie="Exterieur"){
      $this->categorie = $categorie;
    }

    assert(isset($this->nom));
    assert(isset($this->adresse));
    assert(isset($this->categorie));
  }

  function getNom(){
    return $this->nom;
  }

  function getAdresse(){
    return $this->adresse;
  }

  function getCategorie(){
    return $this->categorie;
  }
} ?>
