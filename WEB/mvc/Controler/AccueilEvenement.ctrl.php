<?php
  //require_once("../Model/Article.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");
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





  $ev1 = new Evenement(1,"Compte Rendu de la réunion du 10/12/2019","Actualite/act1_1.jpg","11/12/2019","11/12/2019","11/12/2019",
                      "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit
                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                        occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.",1,"GRENOBLE",true);

  $ev2 = new Evenement(1,"Compte Rendu de la réunion du 10/12/2019","Actualite/act1_1.jpg","11/12/2019","11/12/2019","11/12/2019",
                          "Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna
                          aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                          ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          Duis aute irure dolor in reprehenderit in voluptate velit
                          esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                          occaecat cupidatat non proident, sunt in culpa qui officia
                          deserunt mollit anim id est laborum.",1,"GRENOBLE",false);

  $evenements = array($ev1,$ev2);

  $view = new View("AccueilEvenement");
  //$view->page = $page;
  $view->evenements = $evenements;
  $view->afficher();

 ?>
