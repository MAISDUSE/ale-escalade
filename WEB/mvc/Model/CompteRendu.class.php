<?php
  require_once("../Model/Utilisateur.class.php");

  class CompteRendu{
    private $titre;
    private $datePub;
    private $contenu;
    private $auteur;

    function __construct(string $titre, Date $datePub, string $contenu, Utilisateur $auteur){
      $this->titre = $titre;
      $this->datePub = $datePub;
      $this->contenu = $contenu;
      $this->auteur = $auteur;

      assert(isset($this->titre));
      assert(isset($this->datePub));
      assert(isset($this->contenu));
      assert(isset($this->auteur));
    }

    function getTitre(){
      return $this->titre;
    }

    function getDatePub(){
      return $this->datePub;
    }

    function getContenu(){
      return $this->contenu;
    }

    function getAuteur(){
      return $this->auteur;
    }
  }




 ?>
