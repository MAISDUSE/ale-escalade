<?php
  class Sortie{
    private $nom;
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
    }
  }




 ?>
