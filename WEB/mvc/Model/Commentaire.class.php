<?php

  class Commentaire{    //Dans la BD
    private $numAuteur; //NumAuteur
    private $idSujet;   //IDSujet
    private $date;      //Date
    private $contenue;  //Contenue

    function __construct(int $numAuteur, int $idSujet, Date $date, string $contenue){
      $this->numAuteur = $numAuteur;
      $this->idSujet = $idSujet;
      $this->date = $date;
      $this->contenue = $contenue;
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
    function getContenue(){
      return $this->contenue;
    }
  }


 ?>
