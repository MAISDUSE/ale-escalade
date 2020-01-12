<?php
if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  
} else {
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}
?>
