<?php

require_once("../Model/Actualite.class.php");
  class Actualite{      //Base De Données
    private $id;        //Id
    private $titre;       //Titre
    private $image;       //image
    private $dateCreation; //DateDebut
    private $numCrea;   //NumCrea
    private $description; //description
    private $fichiers;       //image

    function __construct(int $id, string $titre, string $image, string $dateCreation,
                        int $numCrea, string $description, array $fichiers){
      $this->id=$id;
      $this->titre = $titre;
      $this->image = $image;
      $this->dateCreation = $dateCreation;
      $this->numCrea = $numCrea;
      $this->description = $description;
      $this->fichiers = $fichiers;

      assert(isset($this->id));
      assert(isset($this->titre));
      assert(isset($this->image));
      assert(isset($this->dateCreation));
      assert(isset($this->numCrea));
      assert(isset($this->description));
      assert(isset($this->fichiers));
    }

  function getId(){
      return $this->id;
  }

  function getTitre(){
    return $this->titre;
  }

  function getImage(){
    return $this->image;
  }

  function getDateCreation(){
    return $this->dateCreation;
  }

  function getNumCrea(){
    return $this->numCrea;
  }

  function getNomCrea(){
    /*Ici on return le nom et prenom d'un créateur grace a la bd*/
    return "test ".$this->numCrea;
  }

  function getDescription(){
    return $this->description;
  }

  function getFichiers(){
    return $this->fichiers;
  }

}
 ?>
