<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Framework/Retour.class.php");

session_start();

if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  if (isset($_POST['ajouterActualite'])) {
    //Ajouter une actualité
    $view = new View("CreerActualite");
    $view->afficher();
  }   else if (isset($_POST['gererAdherent'])) {
    //Gérer les adhérents
    $view = new View("GestionAdherents");
    $db = new DAO;
    $view->adherents = $db->getAllAdherents();
    $view->afficher();
  } else if (isset($_POST['gererInscription'])) {
    //Gérer les inscriptions
    $view = new View("GestionInscriptions");
    $db = new DAO;
    $view->inscriptions = $db->getAllInscriptions();

    $view->afficher();
  } else if (isset($_POST['gererActualite'])) {
    //Gérer les actualités
    $view = new View("GetsionActualites");
    $db = new DAO;

    $view->actualites = $db->getAllActualite();
    $view->afficher();
  } else if (isset($_POST['gererCours'])){
    //Gérer les cours
    $db = new DAO;
    $view = new View("GestionCours");

    $view->cours = $db->getAllCours();
    $view->afficher();
  } else {
    //Affichage normal de la page
    $view = new View("OutilAdministratif");
    $view->afficher();
  }
}else{
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}

session_write_close();







 ?>
