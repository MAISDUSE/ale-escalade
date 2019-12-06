<?php

/**
 *
 */
class Sujet{


  private $titre;         //Titre
  private $description;   //Contenue
  private $nomUtilisateur;//Select nom from utilisateur, sujet where sujet.IDAuteur = utilisateur.ID
  private $date;          //DatePub
  private $evenement;     //IDEvent
  private $id;
  private $titre;
  private $description;
  private $nomUtilisateur;
  private $date;
  private $evenement;


  function __construct($id,$titre, $description, $nomUtilisateur, $date, $evenement=NULL){
    $this->id = $id;
    $this->titre = $titre;
    $this->description = $description;
    $this->nomUtilisateur = $nomUtilisateur;
    $this->date = $date;
    $this->evenement = $evenement;
  }

  function getTitre(){
    return $this->titre;
  }

  function getDescription(){
    return $this->description;
  }

  function getNomUtilisateur(){
    return $this->nomUtilisateur;
  }

  function getDate(){
    return $this->date;
  }

  function getEvenement(){
    return $this->evenement;
  }
  function getId(){
    return $this->id;
  }

  function setEvenement($evenement){
    $this->evenement = $evenement;
  }
}




 ?>
