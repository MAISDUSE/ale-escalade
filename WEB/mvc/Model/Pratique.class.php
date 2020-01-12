<?php
class Pratique{
  private $type;

  function __construct(string $type){
    if($type=="Difficulte" || $type=="Bloc" || $type=="Vitesse"){
      $this->type = $type;
    }

    assert(isset($this->type));
  }
} ?>
