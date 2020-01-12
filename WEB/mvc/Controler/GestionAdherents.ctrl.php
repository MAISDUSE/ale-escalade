<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  if(isset($_POST['viewUser'])) {
    //Vue du profil de l'adhérent
    $db = new DAO;

    $view = new View("Adherent");
    $view->adherent = $db->getAdherentByCode($_POST['idUser']);
    $view->afficher();
  } else if (isset($_POST['modifUser'])){
    //Vue de modification de l'adhérent
    $db = new DAO;

    $view = new View("ModificationAdherent");
    $view->adherent = $db->getAdherentByCode($_POST['idUser']);
    $view->afficher();
  } else if (isset($_POST['supprUser'])){
    //Suppression de l'adhérent et refresh de la page
    $db = new DAO;
    $db->deleteUserById($_POST['idUser']);

    $view = new View("GestionAdherents");
    $view->adherents = $db->getAllAdherent();
    $view->afficher();
  } else {
    //Affichage normal de la page
    $db = new DAO;

    $view = new View("GestionAdherents");
    $view->adherents = $db->getAllAdherent();
    $view->afficher();
  }
} else {
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}?>
