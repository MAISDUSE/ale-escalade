<?php

  class Utilisateur
  {

    private $ID;
    private $adhID;
    private $adresseMail;
    private $admin;
    private $prenom;
    private $nom;
    private $mdp;


    function __construct($ID,$adhID, $AdresseMail, $Admin, $Prenom, $Nom, $Mdp)
    {
      $this->ID = $ID;
      $this->adhID = $adhID;
      $this->adresseMail = $AdresseMail;
      $this->admin = $Admin;
      $this->prenom = $Prenom;
      $this->nom = $Nom;
      $this->mdp = $Mdp;
    }

    function getID(){
      return $this->ID;
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
