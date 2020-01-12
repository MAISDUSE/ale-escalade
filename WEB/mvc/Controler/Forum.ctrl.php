<?php
//import liste de tous les sujets trié dans l'ordre
require_once("../Model/DAO.class.php");
require_once("../Model/Sujet.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Framework/View.class.php");
require_once("../Framework/Retour.class.php");

session_start();

if(isset($_SESSION['user'])){
  $db = new DAO;

  $sujetsDB = $db->getAllSujets();

  $sujets = array();

  foreach ($sujetsDB as $sujet) {
    $suj = new Sujet($sujet['ID'], $sujet['Titre'], date("d/m/Y",strtotime($sujet['DatePub'])), $sujet['Contenu'], $sujet['IDAuteur'], $sujet['IDEvent']);
    array_push($sujets, $suj);

  }

  $view = new View("Forum");
  $view->listeSujet = $sujets;
  $view->afficher();
}else{
  $_SESSION['erreur'] = new Retour(NULL,TRUE,"Vous devez être connecté pour accéder au forum");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}
 ?>
