<?php
  require_once("../Framework/View.class.php");
  require_once("../Framework/Retour.class.php");
  session_start();
  unset($_SESSION['user']);
  $_SESSION['reussite'] = new Retour(NULL, TRUE, "Déconnexion réussie");
  session_write_close();
  $view = new View('../Controler/Accueil.ctrl.php');
  $view->afficher();


 ?>
