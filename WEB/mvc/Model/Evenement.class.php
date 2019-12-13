<?php

require_once("../Model/Utilisateur.class.php");
  class Evenement{      //Base De Données
    private $id;        //Id
    private $nom;       //Nom
    private $dateDebut; //DateDebut
    private $dateFin;   //DateFin
    private $numCrea;   //NumCrea
    private $nomLieu;    //NomLieu
    private $officiel;  //Officiel

    function __construct(int $id, string $nom, string $dateDebut, string $dateFin, int $numCrea, boolean $officiel){
      $this->id=$id;
      $this->nom = $nom;
      $this->dateDebut = $dateDebut;
      $this->dateFin = $dateFin;
      $this->numCrea = $numCrea;
      $this->nomLieu = $nomLieu;
      $this->officiel = $officiel;

      assert(isset($this->id));
      assert(isset($this->nom));
      assert(isset($this->dateDebut));
      assert(isset($this->dateFin));
      assert(isset($this->numCrea));
      assert(isset($this->nomLieu));
      assert(isset($this->officiel));
    }

  function getNom(){
    return $this->nom;
  }

  function getDateDebut(){
    return $this->$dateDebut;
  }

  function getDateFin(){
    return $this->$dateFin;
  }

  function getDuree(){
    return $this->dateFin - $this->dateDebut;
  }

  function getNumCrea(){
    return $this->numCrea;
  }

  function getNomLieu(){
    return $this->nomLieu;
  }

  function getOfficiel(){
    return $this->officiel;
  }

  function setOfficiel($officiel){
    $this->officiel = $officiel;
  }

}
 ?>
