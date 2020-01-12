<?php
class AssuranceAdh{
  private $numAssurer;
  private $type;
  private $optionSki;
  private $optionSLHL;
  private $optionTrail;
  private $optionVTT;

  function __construct(int $numAssurer, string $type, boolean $optionSki, boolean $optionSLHL, boolean $optionTrail, boolean $optionVTT){
    $this->NumAssurer=$numAssurer;
    if($type=="Responsable Civile" || $type=="Base" || $type=="Base+" || $type=="Base++"){
      $this->type=$type;
    }
    $this->optionSki=$optionSki;
    $this->optionSLHL=$optionSLHL;
    $this->optionTrail=$optionTrail;
    $this->optionVTT=$optionVTT;

    assert(isset($numAssurer));
    assert(isset($optionSki));
    assert(isset($optionSLHL));
    assert(isset($optionTrail));
    assert(isset($optionVTT));
  }

  function getNumAssurer(){
    return $this->numAssurer;
  }

  function getType(){
    return $this->type;
  }

  function getOptionSki(){
    return $this->optionSki;
  }

  function getOptionSLHL(){
    return $this->optionSLHL;
  }

  function getOptionTrail(){
    return $this->optionTrail;
  }

  function getOptionVTT(){
    return $this->optionVTT;
  }
} ?>
