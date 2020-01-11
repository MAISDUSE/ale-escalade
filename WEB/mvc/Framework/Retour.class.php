<?php

  class Retour{

    private $res;
    private $erreur;
    private $messageErreur;

    function __construct($res,$erreur=NULL, $messageErreur=NULL)
    {
      $this->res = $res;
      $this->erreur = $erreur;
      $this->messageErreur = $messageErreur;
    }




    function getRes(){
      if($this->erreur){
        return $this->messageErreur;
      }else{
        return $this->res;
      }
    }

    function isErreur(){
      return $this->erreur;
    }



  }





 ?>
