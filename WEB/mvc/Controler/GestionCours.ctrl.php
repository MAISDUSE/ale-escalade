<?php
require_once("../Model/Cours.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  if (isset($_POST['modifCours'])){
    //Vue de la page de modification du cours
    $db = new DAO;

    $view = new View("ModificationCours");
    $view->cours = $db->getCoursByCode($_POST['idCours']);
    $view->afficher();
  } else if (isset($_POST['supprCours'])){
    //Suppression du cours et refresh de la page
    $db = new DAO;
    $db->deleteCoursrById($_POST['idCours']);

    $view = new View("GestionCours");
    $view->cours = $db->getAllCours();
    $view->afficher();
  } else {
    //Affichage normal de la page
    $db = new DAO;

    $view = new View("GestionCours");
    $view->cours = $db->getAllCours();
    $view->afficher();
  }
} else {
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}
?>
