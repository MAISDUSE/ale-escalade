<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Model/Actualite.class.php");
session_start();
if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() == "TRUE"){
  $formatImage = array("image/jpeg","image/jpg","image/png");
  $formatText = array("application/pdf","application/octet-stream","text/plain");

  $ErreurPhotoDefault = false;
  $ErreurFormat = false;
  $boolPrevusaliser = false;

  if(isset($_POST['poster'])){
    $db = new DAO();
    $titre = $_POST['titre'];
    $imageFond = "Actualite/default.jpg";
    if(isset($_FILES['imageFond'])){
        if(in_array($_FILES['imageFond']['type'],$formatImage)){
          move_uploaded_file($_FILES['imageFond']['tmp_name'], "../Ressources/Actualite/img".($db->getNextNumActualite())."_".$_FILES['imageFond']['name']);
          $imageFond = "Actualite/img".($db->getNextNumActualite())."_".$_FILES['imageFond']['name'];
        }
    }
    $date =  date('Y-m-d');
    $description = $_POST['description'];
    $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
    $nomFichier = $imageFond;
      for ($i=0; $i < $nbFichier ; $i++) {
        if(in_array($_FILES['mesFichiers']['type'][$i],$formatImage)||in_array($_FILES['mesFichiers']['type'][$i],$formatText)){
          move_uploaded_file($_FILES['mesFichiers']['tmp_name'][$i], "../Ressources/Actualite/act".($db->getNextNumActualite())."_".$_FILES['mesFichiers']['name'][$i]);
          $nomFichier .="|Actualite/act".($db->getNextNumActualite())."_".$_FILES['mesFichiers']['name'][$i];
          echo "|Actualite/act".($db->getNextNumActualite())."_".$_FILES['mesFichiers']['name'][$i];

        }
      }
      $actualite = new Actualite($db->getNextNumActualite(),$titre,$imageFond,$date,$_SESSION['user']->getAdhID(),$description,$nomFichier);
      $db->addActualite( $titre, $imageFond, $date,$description, $_SESSION['user']->getAdhID(), $nomFichier);
    }



    if(isset($_POST['poster'])){
      $view = new View("Actualite");
      $view->actualite  = $actualite;
      $view->afficher();

    }else{
      $view = new View("CreerActualite");
      $view->afficher();
    }
}else{
 $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
 $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}


 ?>
