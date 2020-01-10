<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if(isset($_POST['viewUser'])) {
  //Vue du profil de l'adhérent
  $db = new DAO;

  $view = new View("Adherent");
  $view->adherent = $db->getUserByCode($_POST['idUser']);
  $view->afficher();
} else if (isset($_POST['modifUser'])){
  //Vue de modification de l'adhérent
  $db = new DAO;

  $view = new View("ModificationAdherent");
  $view->adherent = $db->getUserByCode($_POST['idUser']);
  $view->afficher();
} else if (isset($_POST['supprUser'])){
  //Suppression de l'adhérent et refresh de la page
  $db = new DAO;
  $db->deleteUserById($_POST['idUser']);

  $view = new View("GestionAdherents");
  $view->adherents = $db->getAllUsers();
  $view->afficher();
} else {
  //Affichage normal de la page
  $db = new DAO;

  $view = new View("GestionAdherents");
  $view->adherents = $db->getAllUsers();
  $view->afficher();
}?>
