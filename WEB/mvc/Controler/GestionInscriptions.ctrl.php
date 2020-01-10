<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if(isset($_POST['accepter'])){
  //Acceptation de l'inscription, on ajoute l'adhérent et suppression de l'inscription
  $db = new DAO;
  $db->addUserFromInscription($_POST['idInscription']);
  $db->deleteInscriptionById($_POST['idInscription']);

  $view = new View("GestionInscriptions");
  $view->inscriptions = $db->getAllInscriptions();
  $view->afficher();
} else if(isset($_POST['refuser'])){
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
}?>
