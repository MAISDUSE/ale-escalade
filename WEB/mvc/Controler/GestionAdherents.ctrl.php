<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");

if(isset($_POST['viewUser'])) {
  $view = new View("Adherent");
  $view->adherent;
} ?>
