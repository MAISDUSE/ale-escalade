<?php
include ("../Model/Enum/TypeCertificat.enum.php");

class Certificat{
  private int $id;
  private int $numAdh;
  private TypeCertificat $type;
  private string $nomMedecin;
  private string $dateSaisie;
  private bool $alpi;


  function __construct(int $id, int $numAdh, TypeCertificat $type, string $nomMedecin, string $dateSaisie, bool $alpi=false){
    if(isset($id)){
      $this->id=$id;
    }

    $this->numAdh=$numAdh;
    $this->type=$type;
    $this->nomMedecin=$nomMedecin;
    $this->dateSaisie=$dateSaisie;
    $this->alpi=$alpi;

    assert(isset($this->id));
    assert(isset($this->numAdh));
    assert(isset($this->type));
    assert(isset($this->nomMedecin));
    assert(isset($this->dateSaisie));
    assert(isset($this->alpi));
  }

  function getId(){
    return $this->id;
  }

  function getNumAdh(){
    return $this->numAdh;
  }

  function getType(){
    return $this->type;
  }

  function getNomMedecin(){
    return $this->nomMedecin;
  }

  function getDateSaisie(){
    return $this->dateSaisie;
  }

  function getAlpi(){
    return $this->alpi;
  }
} ?>
