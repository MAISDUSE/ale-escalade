<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if(isset($_POST['viewUser'])) {
  $view = new View("Adherent");
  $db = new DAO;
  $view->adherent = $db->getUserByCode($_POST['idUser']);
  $view->afficher();
} else if (isset($_POST['modifUser'])){
  $view = new View("ModificationAdherent");
  $db = new DAO;
  $view->adherent = $db->getUserByCode($_POST['idUser']);
  $view->afficher();
} else if (isset($_POST['supprUser'])){
  $db = new DAO;
  $db->deleteUserById($_POST['idUser']);
  $view = new View("GestionAdherents");
  $view->adherents = $db->getAllUsers();
  $view->afficher();
}?>
