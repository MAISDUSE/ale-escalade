<?php

  class Utilisateur
  {
    private $adhID;
    private $adresseMail;
    private $admin;
    private $prenom;
    private $nom;
    private $mdp;


    function __construct($adhId, $AdresseMail, $Admin, $Prenom, $Nom, $Mdp)
    {
      $this->adhID = $adhId;
      $this->adresseMail = $AdresseMail;
      $this->admin = $Admin;
      $this->prenom = $Prenom;
      $this->nom = $Nom;
      $this->mdp = $Mdp;
    }

    function getAdhID(){
      return $this->adhID;
    }

    function getAdresseMail(){
      return $this->adresseMail;
    }

    function isAdmin(){
      return $this->admin;
    }

    function getPrenom(){
      return $this->prenom;
    }

    function getNom(){
      return $this->nom;
    }

    function getMdp(){
      return $this->mdp;
    }


  }


 ?>
