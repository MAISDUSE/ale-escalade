<?php


//import liste de tous les sujets trié dans l'ordre

//test temporaire
require_once("../Model/Sujet.class.php");
require_once("../Framework/View.class.php");


//test temporaire a la place requete sql
$sujet1 = new Sujet(1,"Test","Un petit s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
$miseEnAmont1 = substr($sujet1->getDescription(),0,20) . "...";

$sujet2 = new Sujet(2,"Test2","Un petit 2 s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
$miseEnAmont2 = substr($sujet2->getDescription(),0,20) . "...";


$all = array (array($sujet1,$miseEnAmont1), array($sujet2,$miseEnAmont2));
//mettremethode extrait from BDD

//var_dump($all);



$view = new View("Forum");
$view->listeSujet = $all;
$view->afficher();

 ?>
