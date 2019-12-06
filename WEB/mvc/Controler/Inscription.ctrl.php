<?php
require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");




$view = new View("Inscription");
//$view->page = $page;
$view->afficher();

?>
