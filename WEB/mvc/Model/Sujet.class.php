<?php

/**
 *
 */
class Sujet{

  private $id;              //Id
  private $titre;           //Titre
  private $description;     //Contenue
  private $nomUtilisateur;  //Select nom from utilisateur, sujet where sujet.IDAuteur = utilisateur.ID
  private $datePub;         //datePub
  private $evenement;       //IDEvent




  function __construct($id,$titre, $description, $nomUtilisateur, $datePub, $evenement=NULL){
    $this->id = $id;
    $this->titre = $titre;
    $this->description = $description;
    $this->nomUtilisateur = $nomUtilisateur;
    $this->datePub = $datePub;
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

  function getdatePub(){
    return $this->datePub;
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
