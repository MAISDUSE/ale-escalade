<?php
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/Evenement.class.php");
  require_once("../Framework/Retour.class.php");
  require_once("../Framework/View.class.php");

  session_start();

  if(isset($_SESSION['user'])){

    $db = new DAO;
    $evenements = $db->getAllEvent();

    $view = new View("ListeEvenement");
    $view->events = $evenements;
    $view->afficher();






  }else{
    $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté pour accéder aux événements");
    session_write_close();
    $view = new View("../Controler/Accueil.ctrl.php");
    $view->afficher();
  }










 ?>
