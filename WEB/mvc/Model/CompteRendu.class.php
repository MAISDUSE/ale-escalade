<?php
  require_once("../Model/Utilisateur.class.php");

  class CompteRendu{
    private $titre;
    private $datePub;
    private $contenue;
    private $Auteur;

    function __construct(string $titre, Date $datePub, string $contenue, int $Auteur){
      $this->titre = $titre;
      $this->datePub = $datePub;
      $this->contenue = $contenue;
      $this->$Auteur = $Auteur;

      assert(isset($this->titre));
      assert(isset($this->datePub));
      assert(isset($this->contenue));
      assert(isset($this->Auteur));
    }

    function getTitre(){
      return $this->titre;
    }

    function getDatePub(){
      return $this->datePub;
    }

    function getContenue(){
      return $this->contenue;
    }

    function getAuteur(){
      return $this->Auteur;
    }
  }




 ?>
