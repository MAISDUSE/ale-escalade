<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");


/*
    ICI METTRE CODE POUR TESTER L'EXISTENCE DU COMPTE
*/



if(isset($_POST['mail']) && isset($_POST['passwd'])){
  if(isset($_SESSION['erreur'])){
    $view = new View("Connexion");
    $view->afficher();
  }

  $mail = $_POST['mail'];
  $mdp = $_POST['passwd'];
  $db = new DAO;
  $retour = $db->verifUser($mail, $mdp);
  session_start();
  if(!$retour->isErreur()){

    $_SESSION['user'] = new Utilisateur($resultat['AdhID'],$resultat['adresseMail'],
                                      $resultat['Admin'], $resultat['Prenom'],$resultat['Nom'],
                                      $resultat['Mdp']);
    session_write_close();
    $view = new View('../Controler/Accueil.ctrl.php');
    $view->afficher();


  }else{
    $_SESSION['erreur'] = $retour->getRes();
    $view = new View("Connexion");
    $view->afficher();
  }

}else{
  $view = new View("Connexion");
  $view->afficher();
}



//$view->page = $page;
//$view->page = $nomUtilisateur
//$view->page = $passeportUtilisateur


?>
