<?php
  require_once("../Model/Message.class.php");
  require_once("../Model/Utilisateur.class.php");

  $exp = new Utilisateur(0,"test1", 0, "Testeur1", "Testeur1", 0, "01/01/2000", "pasloin", "","", "", 0, "", 0);
  $dest = new Utilisateur(0,"test2", 0, "Testeur2", "Testeur2", 0, "01/01/2000", "pasloin", "","", "", 0, "", 0);


  $mes = new Message($exp, $dest, "01/01/2000", "pasgrandchose");
  var_dump($mes->getActeurs());

 ?>
