<?php

  require_once("../Framework/Retour.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Model/DAO.class.php");

  session_start();
  if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];

    if(isset($_POST['titre'])){
      $titre = $_POST['titre'];
      $date = date("Y-m-d");
      $contenu = $_POST['contenu'];
      $IDAuteur = $user->getAdhID();

      if(isset($_POST['IDEvent']))){
        $IdEvent = $_POST['IDEvent'];
      }else{
        $IdEvent = NULL;
      }

      $db = new DAO;
      $res = $db->addSujet($titre,$date,$contenu,$IDAuteur,$IDEvent);



    }else{
      $view = new View("CreerSujet");
    }

  }else{
    $erreur = new Retour(NULL, TRUE, "Il faut être connecté pour pouvoir utiliser le forum");
    $_SESSION['erreur'] = $erreur;
  }

  session_write_close();

 ?>
