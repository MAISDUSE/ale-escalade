<?php
function getNbActualite(){
  return 1;
}
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Model/Actualite.class.php");

//  $formatImage = array("image/jpeg","image/jpg","image/png");
  $formatText = array(".pdf",".txt",".doc",".docx",".csv",".odt");

  $ErreurPhotoDefault = false;
  $ErreurFormat = false;
  $boolPrevusaliser = false;

  if(isset($_POST['poster'])){
    $db = new DAO();
    /*$idActualite = getProchainId() à coder*/
    $titre = $_POST['titre'];
    $imageFond = "Actualite/default.jpg";
    if(isset($_FILES['imageFond'])){
          move_uploaded_file($_FILES['imageFond']['tmp_name'], "../Ressources/Actualite/img".($db->getNextNumActualite())."_".$_FILES['imageFond']['name']);
          $imageFond = "Actualite/img".($db->getNextNumActualite())."_".$_FILES['imageFond']['name'];

    }
    $date =  date('Y-m-d');
    /*$idUser = getIdUser à coder*/

    $description = $_POST['description'];
    $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
    var_dump($_FILES['mesFichiers']);
    $nomFichier = $imageFond;
    if(! empty($_FILES['mesFichiers'][0])){
      for ($i=0; $i < $nbFichier ; $i++) {
          move_uploaded_file($_FILES['mesFichiers']['tmp_name'][$i], "../Ressources/Actualite/act".($db->getNextNumActualite())."_".$_FILES['mesFichiers']['name'][$i]);

          $nomFichier .="|Actualite/act".($db->getNextNumActualite())."_".$_FILES['mesFichiers']['name'][$i];

      }
    }
      $actualite = new Actualite(1,$titre,$imageFond,$date,1,$description,$nomFichier);
      $db->addActualite( $titre, $imageFond, $date,$description, 1, $nomFichier);
    }



    if(isset($_POST['poster'])){

      $view = new View("Actualite");
      $view->actualite  = $actualite;
      $view->afficher();

    }else{
      $view = new View("CreerActualite");
      $view->afficher();
    }
//}else{
//  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté et être administrateur pour accéder à cette page");
//  $view = new View("../Controler/Accueil.ctrl.php");
//  $view->afficher();
//}


 ?>
