<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");


/*
    ICI METTRE CODE POUR TESTER L'EXISTENCE DU COMPTE
*/

$mail = $_POST['mail'];
$mdp = $_POST['passwd'];

$db = new DAO;




$view = new View("Connexion");
//$view->page = $page;
//$view->page = $nomUtilisateur
//$view->page = $passeportUtilisateur

$view->afficher();

?>
