<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if (isset($_POST['ajouterActualite'])) {
  $view = new View("CreerActualite");
  $view->afficher();
}else{
  $view = new View("OutilAdministratif");
  $view->afficher();
}








 ?>
