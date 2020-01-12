<?php

  require_once("../Framework/Retour.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Model/Utilisateur.class.php");

  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

    if(isset($_POST['titre'])){
      $titre = $_POST['titre'];
      $date = date("Y-m-d");
      $contenu = $_POST['contenu'];
      $IDAuteur = $user->getID();

      if(isset($_POST['IDEvent'])){
        $IdEvent = $_POST['IDEvent'];
      }else{
        $IdEvent = NULL;
      }

      $db = new DAO;
      $db->addSujet($titre,$date,$contenu,$IDAuteur,$IDEvent);
      $complet = new Retour(NULL, TRUE, "Sujet créé");
      $_SESSION['reussite'] = $complet;
      $view = new View("../Controler/Forum.ctrl.php");
      $view->afficher();


    }else{
      $view = new View("CreerSujet");
      $view->afficher();
    }

  }else{
    $erreur = new Retour(NULL, TRUE, "Il faut être connecté pour pouvoir utiliser le forum");
    $_SESSION['erreur'] = $erreur;
    $view = new View("../Controler/Accueil.ctrl.php");
    $view->afficher();
  }

  session_write_close();

 ?>
