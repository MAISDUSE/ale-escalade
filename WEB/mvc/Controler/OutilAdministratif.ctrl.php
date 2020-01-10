<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if (isset($_POST['ajouterActualite'])) {
  $view = new View("CreerActualite");
  $view->afficher();
} else if (isset($_POST['GererAdherent'])) {
  $view = new View("GestionAdherents");
  $db = new DAO;
  $view->adherents = $db->getAllUsers();
  $view->afficher();
} else if (isset($_POST['GererInscription'])) {
  $view = new View("GestionInscriptions");
  $db = new DAO;
  //$view->InscriptionsEnAttente A completer

  $view->afficher();
} else {
  $view = new View("OutilAdministratif");
  $view->afficher();
}








 ?>
