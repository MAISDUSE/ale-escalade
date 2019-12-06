<?php

require_once("../Model/Utilisateur.class.php");
  class Sortie{
    private $nom;
    private $contenue;
    private $date;
    private $utilisateur;
    private $adresse;
    private $image;
    private $pratique;
    private $valide;

    function __construct($nom, $date, $utilisateur, $adresse, $image, $pratique=NULL, $valide =NULL){
      $this->nom = $nom;
      $this->date = $date;
      $this->utilisateur = $utilisateur;
      $this->adresse = $adresse;
      $this->image = $image;
      $this->pratique = $pratique;
      $this->valide = $valide;
    }

  function getNom(){
    return $this->nom;
  }

  function getDate(){
    return $this->date;
  }

  function getUtilisateur(){
    return $this->utilisateur;
  }

  function getAdresse(){
    return $this->adresse;
  }

  function getImage(){
    return $this->image;
  }

  function getPratique(){
    return $this->pratique;
  }

  function getValide(){
    return $this->valide;
  }

  function setPratique($pratique){
    $this->pratique = $pratique;
  }

  function setValide($valide){
    $this->valide = $valide;
  }

}
 ?>
