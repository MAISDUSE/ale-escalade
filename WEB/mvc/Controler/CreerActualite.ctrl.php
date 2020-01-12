<?php
function getNbActualite(){
  return 1;
}
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Model/Actualite.class.php");

if(isset($_SESSION['user']) && ($_SESSION['user']->isAdmin() == "TRUE")){
  $formatImage = array("image/jpeg","image/jpg","image/png");
  $formatText = array(".pdf",".txt",".doc",".docx",".csv",".odt");

  $ErreurPhotoDefault = false;
  $ErreurFormat = false;
  $boolPrevusaliser = false;

  if(isset($_POST['poster'])){
    /*$idActualite = getProchainId() à coder*/
    $titre = $_POST['titre'];
    $imageFond = "Actualite/default.jpg";
    if(isset($_FILES['imageFond'])){
      if(in_array($_FILES['imageFond']['type'], $formatImage)){
          move_uploaded_file($_FILES['imageFond']['tmp_name'], "../Ressources/test2/".$_FILES['imageFond']['name']);
          $imageFond = "test2/".$_FILES['imageFond']['name'];
      }else{
        $ErreurPhotoDefault=true;
      }
    }
    $date =  date('Y-m-d');
    /*$idUser = getIdUser à coder*/

    $descrition = $_POST['description'];
    $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
    $nbFichierVal = 0;
    $nomFichier = "";
      for ($i=0; $i < $nbFichier ; $i++) {
        if (in_array($_FILES['imageFond']['type'], $formatImage) || in_array($_FILES['imageFond']['type'], $formatText)) {
          move_uploaded_file($_FILES['mesFichiers']['tmp_name'][$i], "../Ressources/Actualite/act".getNbActualite()."_".$_FILES['mesFichiers']['name'][$i]);

          if($nbFichierVal<0){
            $nomFichier ="Actualite/act".getNbActualite()."_".$_FILES['mesFichiers']['name'][$i];

          }else{
            $nomFichier .="|Actualiteact".getNbActualite()."_".$_FILES['mesFichiers']['name'][$i];
          }
          $nbFichierVal++;
        }else{
          $ErreurFormat = true;
        }
      }
      echo $nomFichier;
      $actualite = new Actualite(1,$titre,$imageFond,$date,1,$descrition,$nomFichier);
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
