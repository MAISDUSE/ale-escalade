<?php

  class Commentaire{    //Dans la BD
    private $numAuteur; //NumAuteur
    private $idSujet;   //IDSujet
    private $date;      //Date
    private $contenu;  //Contenu

    function __construct(int $numAuteur, int $idSujet, string $date, string $contenu){
      $this->numAuteur = $numAuteur;
      $this->idSujet = $idSujet;
      $this->date = $date;
      $this->contenu = $contenu;
    }

    function getNumAuteur(){
      return $this->numAuteur;
    }

    function getIDSujet(){
      return $this->idSujet;
    }

    function getDate(){
      return $this->date;
    }
    function getContenu(){
      return $this->contenu;
    }
  }


 ?>
