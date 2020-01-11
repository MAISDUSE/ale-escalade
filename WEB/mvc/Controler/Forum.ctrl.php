<?php


//import liste de tous les sujets trié dans l'ordre

//test temporaire
require_once("../Model/Sujet.class.php");
require_once("../Framework/View.class.php");


//test temporaire a la place requete sql
$sujet1 = new Sujet(1,"Test",date("d/m/Y"),"Un petit s'est fait gommer il y aurait pas de message bande de fils ",15);
$miseEnAmont1 = substr($sujet1->getContenu(),0,20) . "...";

$sujet2 = new Sujet(2,"Test",date("d/m/Y"),"Un petit s'est fait gommer il y aurait pas de message bande de fils ",15);
$miseEnAmont2 = substr($sujet2->getContenu(),0,20) . "...";


$all = array (array($sujet1,$miseEnAmont1), array($sujet2,$miseEnAmont2));
//mettremethode extrait from BDD

//ici
//var_dump($all);



$view = new View("Forum");
$view->listeSujet = $all;
$view->afficher();

 ?>
