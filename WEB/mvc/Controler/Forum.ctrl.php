<?php
session_start();

//import liste de tous les sujets trié dans l'ordre
require_once("../Model/DAO.class.php");
require_once("../Model/Sujet.class.php");
require_once("../Framework/View.class.php");

$db = new DAO;

$sujetsDB = $db->getAllSujets();

$sujets = array();

foreach ($sujetsDB as $sujet) {
  $suj = new Sujet($sujet['ID'], $sujet['Titre'], date("d/m/Y",$sujet['DatePub']), $sujet['Contenu'], $sujet['IDAuteur'], $sujet['IDEvent']);
  array_push($sujets, $suj);

}






/*
//test temporaire a la place requete sql
$sujet1 = new Sujet(1,"Test",date("d/m/Y"),"Un petit s'est fait gommer il y aurait pas de message bande de fils ",15);
$miseEnAmont1 = substr($sujet1->getContenu(),0,20) . "...";

$sujet2 = new Sujet(2,"Test",date("d/m/Y"),"Un petit s'est fait gommer il y aurait pas de message bande de fils ",15);
$miseEnAmont2 = substr($sujet2->getContenu(),0,20) . "...";
*/



//mettremethode extrait from BDD

//ici



$view = new View("Forum");
$view->listeSujet = $sujets;
$view->afficher();

 ?>
