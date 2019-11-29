<?php

/**
 *
 */
class Sujet{

  private $titre;
  private $description;
  private $nomUtilisateur;
  private $date;
  private $evenement;

  function __construct($titre, $description, $nomUtilisateur, $date, $evenement=NULL){
    $this->$titre = $titre;
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

  function setEvenement($evenement){
    $this->evenement = $evenement;
  }
}




 ?>
