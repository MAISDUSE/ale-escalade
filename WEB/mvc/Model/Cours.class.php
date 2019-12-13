<?php
class Cours{
  private $id;
  private $nom;
  private $heureDebut;
  private $heureFin;
  private $jour;
  private $nbPlace;
  private $nomLieu;
  private $numEntraineur;

  function __construct(int $id, string $nom, string $heureDebut, string $heureFin, string $jour, int $nbPlace, string $nomLieu, int $numEntraineur){
    $this->id=$id;
    $this->nom=$nom;
    if($heureDebut<$heureFin){
      $this->heureDebut=$heureDebut;
      $this->heureFin=$heureFin;
    }
    if($jour=="L" || $jour=="M" || $jour=="Me" || $jour=="J" || $jour=="V" || $jour=="S" || $jour=="D"){
      $this->jour=$jour;
    }
    $this->nbPlace=$nbplace;
    $this->nomLieu=$nomLieu;
    $this->numEntraineur=$numEntraineur;

    assert(isset($this->id));
    assert(isset($this->nom));
    assert(isset($this->heureDebut));
    assert(isset($this->heureFin));
    assert(isset($this->jour));
    assert(isset($this->nbPlace));
    assert(isset($this->nomLieu));
    assert(isset($this->numEntraineur));
  }

  function getId(){
    return $this->id;
  }

  function getNom(){
    return $this->nom;
  }

  function getHeureDebut(){
    return $this->heureDebut;
  }

  function getHeureFin(){
    return $this->heureFin;
  }

  function getJour(){
    return $this->jour;
  }

  function getNbPlace(){
    return $this->nbPlace;
  }

  function getNomLieu(){
    return $this->nomLieu;
  }

  function getNumEntraineur(){
    return $this->numEntraineur;
  }
} ?>
