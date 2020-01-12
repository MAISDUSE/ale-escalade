<?php
require_once("../Model/Utilisateur.class.php");
//require_once("../Model/Inscription.class.php"); A décommenter une fois créée
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  if(isset($_POST['accepter'])){
    //Acceptation de l'inscription, on ajoute l'adhérent et suppression de l'inscription
    $db = new DAO;
    $db->addUserFromInscription($_POST['idInscription']);
    $db->deleteInscriptionById($_POST['idInscription']);

    $view = new View("GestionInscriptions");
    $view->inscriptions = $db->getAllInscriptions();
    $view->afficher();
  } else if(isset($_POST['refuser'])){
    var_dump($_POST['idInscription']);
    //Refus de l'inscription, on la supprime puis refresh de la page
    $db = new DAO;
    $db->deleteInscriptionById($_POST['idInscription']);

    $view = new View("GestionInscriptions");
    $view->inscriptions = $db->getAllInscriptions();
    $view->afficher();
  } else {
    //Affichage normal de la page
    $db = new DAO;

    $view = new View("GestionInscriptions");
    $view->inscriptions = $db->getAllInscriptions();
    $view->afficher();
  }
} else {
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}

session_write_close();
?>
