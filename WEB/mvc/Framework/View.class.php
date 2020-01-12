<?php

  class View{
    private $path;

    function __construct($path){
        $this->path = $path;
    }

    function afficher($path=NULL){
      $p = $path ? $path : $this->path;

      if($p[0] != '.' && $p[0] != '/'){
        $p = "../View/".$p;
      }

      if(!strpos($p,"view.php") && !strpos($p,"ctrl.php")){
        $p = $p . ".view.php";
      }
      foreach ($this as $key => $value) {
        $$key = $this->$key;
      }

      include($p);
    }
  }



 ?>
