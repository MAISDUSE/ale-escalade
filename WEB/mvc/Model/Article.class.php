<?php

class Article
{

  private $titre;
  private $contenu;
  private $image;
  private $nbPieceJointe;

  function __construct($titre, $contenu)
  {
    $this->titre = $titre;
    $this->contenu = $contenu;
  }
}




 ?>
