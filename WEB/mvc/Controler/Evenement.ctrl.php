<?php
  //require_once("../Model/Article.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Framework/Retour.class.php");
  require_once("../Model/Evenement.class.php");
  /*session_start();

  if(!isset($_SESSION['db'])){
    //$_SESSION['db'] = new DAO;
  }

  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
  }

  if(!isset($page)){
    $page = $_GET['page'];
    $page = 1;
  }*/


/*ICI ON VA CREER UNE FONCTION QUI NOUS PERMET DE RECUPERER L'ACTUALITE
GRACE A UNE DAOCLASS*/



$ev1 =


$view = new View("Evenement");


  $view = new View("Evenement");
  $view->evenement= $ev1;
  $view->afficher();

 ?>
