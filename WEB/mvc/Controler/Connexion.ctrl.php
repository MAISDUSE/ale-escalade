<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");


/*
    ICI METTRE CODE POUR TESTER L'EXISTENCE DU COMPTE
*/
session_start();
if(isset($_POST['mail']) && isset($_POST['passwd'])){
  if(isset($_SESSION['erreur'])){
    $view = new View("Connexion");
    $view->afficher();
  }

  $mail = $_POST['mail'];
  $mdp = $_POST['passwd'];
  $db = new DAO;
  $retour = $db->verifUser($mail, $mdp);

  if(!$retour->isErreur()){
    $resultat = $retour->getRes();
    $_SESSION['user'] = new Utilisateur($resultat['ID'], $resultat['AdhID'],$resultat['adresseMail'],
                                      $resultat['Admin'], $resultat['Prenom'],$resultat['Nom'],
                                      $resultat['Mdp']);


    $_SESSION['reussite'] = new Retour(NULL, TRUE , "Vous êtes connecté(e)");
    session_write_close();
    $view = new View('../Controler/Accueil.ctrl.php');
    $view->afficher();


  }else{
    $_SESSION['erreur'] = new Retour(NULL, TRUE, "Mot de passe ou e-mail incorrect");
    session_write_close();
    $view = new View("Connexion");
    $view->afficher();
  }

}else{
  session_write_close();
  $view = new View("Connexion");
  $view->afficher();
}






?>
