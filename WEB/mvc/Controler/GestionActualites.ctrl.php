<?php
require_once("../Model/Actualite.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  if(isset($_POST['viewAuteur'])){
    //Affichage du profil de l'auteur
    $db = new DAO;

    $view = new View("Adherent");
    $view->adherent = $db->getAdherentByCode($_POST['idAuteur']);
    $view->afficher();
  } else if (isset($_POST['viewActualite'])){
    //Affichage de l'actualité
    $db = new DAO;

    $view = new View("Actualite");
    $view->actualite = $db->getActualiteById($_POST['idActualite']);
    $view->afficher();
  } else if (isset($_POST['modifActualite'])){
    //Affichage de la page de modification de l'actualité
    $db = new DAO;

    $view = new View("ModificationActualite");
    $view->actualite = $db->getActualiteById($_POST['idActualite']);
    $view->afficher();
  } else if (isset($_POST['supprActualite'])){
    //Suppression de l'actualité
    $db = new DAO;
    $db->deleteActualiteById($_POST['idActualite']);

    $view = new View("GestionActualites");
    $view->actualites = $db->getAllActualite();
    $view->afficher();
  } else {
    //Affichage normal de la page
    $db = new DAO;

    $view = new View("GestionActualites");
    $view->actualites = $db->getAllActualite();
    $view->afficher();
  }
} else {
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}?>
