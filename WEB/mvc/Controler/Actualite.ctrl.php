<?php
  //require_once("../Model/Article.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Model/Actualite.class.php");
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
  $db = new DAO();
  $id = $_GET["id"];
  $actualite = $db->getActualiteByID($id);

  $view = new View("Accueil");

  $view = new View("Actualite");
  $view->actualite = $actualite;
  /*Si l'utilisateur existe il faut afficher ses infos perso sur la nav bar

  $view->page = $nomUtilisateur
  $view->page = $passeportUtilisateur

  */
  $view->afficher();

 ?>
