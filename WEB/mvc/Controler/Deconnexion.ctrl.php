<?php
  require_once("../Framework/View.class.php");
  session_start();
  unset($_SESSION['user']);
  session_write_close();
  $view = new View('../Controler/Accueil.ctrl.php');
  $view->afficher();


 ?>
