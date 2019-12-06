<?php
  require_once("../Model/Utilisateur.class.php");


  class Message{
    private $Expediteur;
    private $Destinataire;
    private $dateEnvoi;
    private $contenue;

    function __construct(Utilisateur $Expediteur, Utilisateur $Destinataire, Date $dateEnvoi, string $contenue){
      $this->Expediteur = $Expediteur;
      $this->Destinataire = $Destinataire;
      $this->dateEnvoi = $dateEnvoi;
      $this->contenue = $contenue;

      assert(isset($this->Expediteur));
      assert(isset($this->Destinataire));
      assert(isset($this->dateEnvoi));
      assert(isset($this->contenue));
    }

    function getExpediteur(){
      return $this->Expediteur;
    }
    function getDestinataire(){
      return $this->Destinataire;
    }
    function getDateEnvoi(){
      return $this->dateEnvoi;
    }
    function getContenue(){
      return $this->contenue;
    }

    function getActeurs(){
      return array($this->Expediteur, $this->Destinataire);
    }

  }

 ?>
