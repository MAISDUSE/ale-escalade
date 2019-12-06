<?php

require_once("../Model/Utilisateur.class.php");
  class Sortie{           //Bese De Données
    private $nom;         //Nom
    private $dateDebut;   //DateDebut
    private $dateFin;     //DateFin
    private Utilisateur $utilisateur;
    private $adresse;     //select adresse FROM Event E, Lieu L where E.NomLieu = L.Nom
    private $image;       //Pas (encore) intégrer a la BD
    private $pratique;    //Select TypePrat FROM Sujet S, PratiqueEvent P WHERE S.ID = P.IDEvent;
    private $valide;      //Officiel

    function __construct($nom, $dateDebut, $dateFin, $utilisateur, $adresse, $image, $pratique=NULL, $valide =NULL){
      $this->nom = $nom;
      $this->dateDebut = $dateDebut;
      $this->dateFin = $dateFin;
      $this->utilisateur = $utilisateur;
      $this->adresse = $adresse;
      $this->image = $image;
      $this->pratique = $pratique;
      $this->valide = $valide;
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
