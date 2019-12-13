<?php
  require_once("../Model/Utilisateur.class.php");


  class Message{
    private $expediteur;
    private $destinataire;
    private $dateEnvoi;
    private $contenu;

    function __construct(Utilisateur $expediteur, Utilisateur $destinataire, string $dateEnvoi, string $contenu){
      $this->expediteur = $expediteur;
      $this->destinataire = $destinataire;
      $this->dateEnvoi = $dateEnvoi;
      $this->contenu = $contenu;

      assert(isset($this->expediteur));
      assert(isset($this->destinataire));
      assert(isset($this->dateEnvoi));
      assert(isset($this->contenu));
    }

    function getExpediteur(){
      return $this->expediteur;
    }
    function getDestinataire(){
      return $this->destinataire;
    }
    function getDateEnvoi(){
      return $this->dateEnvoi;
    }
    function getContenu(){
      return $this->contenu;
    }

    function getActeurs(){
      return array($this->Expediteur, $this->Destinataire);
    }

  }

 ?>
