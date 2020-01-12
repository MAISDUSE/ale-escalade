<?php

  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Framework/Retour.class.php");
  require_once("../Model/Utilisateur.class.php");


  session_start();
  if(isset($_SESSION['user'])){

    $db = new DAO;
    $numAuteur = $_SESSION['user']->getID();
    $IDSujet = $_POST['sujet'];
    $DateCreation = date("Y-m-d");
    $Contenu = $_POST['contenu'];

    $db->addCommentaire($numAuteur,$IDSujet,$DateCreation,$Contenu);
    $_SESSION['reussite'] = new Retour(NULL, TRUE, "Commentaire ajouté");
    session_write_close();

    $view = new View("../Controler/SujetForum.ctrl.php");
    $view->pageSujet = $_POST['sujet'];
    $view->afficher();

  }else{
    $retour = new Retour(NULL, TRUE, "Vous devez être connecté");
    $_SESSION['erreur'] = $retour;
    session_write_close();
    $view = new View("../Controler/Accueil.ctrl.php");
    $view->afficher();
  }










 ?>
