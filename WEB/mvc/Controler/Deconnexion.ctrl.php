<?php
  require_once("../Framework/View.class.php");
  unset($_SESSION['user']);
  $view = new View('../Controler/Accueil.ctrl.php');
  $view->afficher();


 ?>
