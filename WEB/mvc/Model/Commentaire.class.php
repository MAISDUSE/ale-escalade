<?php

  class Commentaire{    //Dans la BD
    private $NumAuteur; //NumAuteur
    private $IDSujet;   //IDSujet
    private $DateCreation;      //DateCreation
    private $Contenu;  //Contenu

    function __construct(int $NumAuteur, int $IDSujet, string $DateCreation, string $Contenu){
      $this->NumAuteur = $NumAuteur;
      $this->IDSujet = $IDSujet;
      $this->DateCreation = $DateCreation;
      $this->Contenu = $Contenu;

      assert(isset($this->NumAuteur));
      assert(isset($this->IDSujet));
      assert(isset($this->DateCreation));
      assert(isset($this->Contenu));
    }

    function getNumAuteur(){
      return $this->NumAuteur;
    }

    function getIDSujet(){
      return $this->IDSujet;
    }

    function getDateCreation(){
      return $this->DateCreation;
    }
    function getContenu(){
      return $this->Contenu;
    }
  }


 ?>
