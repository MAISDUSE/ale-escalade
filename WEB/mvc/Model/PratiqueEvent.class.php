<?php
class PratiqueEvent{
  private $id;
  private $idEvent;
  private $idCours;
  private $type;

  function __construct(int $id, int $idEvent, int $idCours, string $type){
    $this->id = $id;
    $this->idEvent = $idEvent;
    $this->idCours = $idCours;
    if($type=="Difficulte" || $type=="Bloc" || $type=="Vitesse"){
      $this->type = $type;
    }
  }

  function getId(){
    return $this->id;
  }

  function getIdEvent(){
    return $this->idEvent;
  }

  function getIdCours(){
    return $this->idCours;
  }

  function getType(){
    return $this->type;
  }
} ?>
