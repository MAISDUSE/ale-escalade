<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Framework/Retour.class.php");


if(isset($_POST['age'])){
  $date = date("Y-m-d", strtotime($_POST['age']));
  $db = new DAO;
  $db->addInscription($_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['base']
                      ,$date, $_POST['adresse'], $_POST['mail'], $_POST['passeport']
                      ,$_POST['tel'], $_POST['nomContact'], $_POST['prenomContact']
                      ,$_POST['telContact'], $_POST['adresseContact'], $_POST['mailContact']);

  $retour = new Retour(NULL, TRUE, "Inscription réussit. Vous recevrez un mail à "
                        . $_POST['mail'] . " lorsqu'elle sera validée ou refusée");

  session_start();
  $_SESSION['reussite'] = $retour;
  session_write_close();
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}else{
  $view = new View("Inscription");
  $view->afficher();
}
/*$else{
view = new View("Inscription");
$view->afficher();*/

?>
