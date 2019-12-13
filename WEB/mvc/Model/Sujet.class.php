<?php

/**
 *
 */
class Sujet{

  private $id;        //Id
  private $titre;     //Titre
  private $datePub;   //datePub
  private $contenu;   //Contenu
  private $idAuteur;  //IDAuteur
  private $idEvent;   //IDEvent

  function __construct(int $id, string $titre, string $datePub, string $contenu, int $idAuteur, int $idEvent=null){
    $this->id = $id;
    $this->titre = $titre;
    $this->contenu = $contenu;
    $this->datePub = $datePub;
    $this->idAuteur = $idAuteur;
    $this->idEvent = $idEvent;
  }

  function getTitre(){
    return $this->titre;
  }

  function getDescription(){
    return $this->description;
  }

  function getIdAuteur(){
    return $this->idAuteur;
  }

  function getdatePub(){
    return $this->datePub;
  }

  function getIdEvent(){
    return $this->idEvent;
  }
  function getId(){
    return $this->id;
  }

  function setIdEvent($idEvent){
    $this->idEvent = $idEvent;
  }

}




 ?>
