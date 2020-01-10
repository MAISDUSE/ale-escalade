<?php

  class Retour{

    private $res;
    private $erreur;
    private $messageErreur;

    function __construct($res, $erreur, $messageErreur)
    {
      $this->res = $res;
      $this->erreur = $erreur;
      $this->messageErreur = $messageErreur;
    }

    function getRes(){
      if($this->erreur){
        echo "Erreur Res : " . $this->messageErreur;
      }else{
        return $this->res;
      }
    }

  }





 ?>
