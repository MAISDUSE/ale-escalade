<?php
  //require_once("../Model/Article.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");

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

  $view = new View("Accueil");
  //$view->page = $page;
  $view->afficher();










 ?>
