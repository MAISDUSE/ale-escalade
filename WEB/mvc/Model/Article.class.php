<?php

class Article
{

  private $titre;
  private $contenu;
  private $image;
  private $nbPieceJointe;

  function __construct($titre, $contenu, $image, $nbPieceJointe)
  {
    $this->titre = $titre;
    $this->contenu = $contenu;
    $this->image = $image;
    $this->nbPieceJointe = $nbPieceJointe;
  }

  function getTitre(){
    return $this->titre;
  }

  function getContenu(){
    return $this->contenu;
  }

  function getImage(){
    return $this->image;
  }

  function getNbPiecejointe(){
    return $this->nbPieceJointe;
  }

  function setNbPieceJointe($nb){
    $this->nbPieceJointe = $nb;
  }

}




 ?>
