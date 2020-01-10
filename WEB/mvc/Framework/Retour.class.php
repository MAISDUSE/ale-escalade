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

    function __construct1($erreur, $messageErreur)
    {
      $this->erreur = $erreur;
      $this->messageErreur = $messageErreur;
    }

    function __construct2($res)
    {
      $this->erreur = FALSE;
      $this->res = $res;
    }



    function getRes(){
      if($this->erreur){
        echo "Erreur : " . $this->messageErreur;
      }else{
        return $this->res;
      }
    }

  }





 ?>
