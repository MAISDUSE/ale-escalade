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
          move_uploaded_file($_FILES['imageFond']['tmp_name'], "../Ressources/Actualite/img".($db->getNbActualite()[0]+1)."_".$_FILES['imageFond']['name']);
          $imageFond = "Actualite/img".($db->getNbActualite()[0]+1)."_".$_FILES['imageFond']['name'];

    }
    $date =  date('Y-m-d');
    /*$idUser = getIdUser à coder*/

    $description = $_POST['description'];
    $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
    $nbFichierVal = 0;
    $nomFichier = "";
      for ($i=0; $i < $nbFichier ; $i++) {
          move_uploaded_file($_FILES['mesFichiers']['tmp_name'][$i], "../Ressources/Actualite/act".($db->getNbActualite()[0]+1)."_".$_FILES['mesFichiers']['name'][$i]);

          if($nbFichierVal<=0){
            $nomFichier ="Actualite/act".($db->getNbActualite()[0]+1)."_".$_FILES['mesFichiers']['name'][$i];

          }else{
            $nomFichier .="|Actualite/act".($db->getNbActualite()[0]+1)."_".$_FILES['mesFichiers']['name'][$i];
          }
          $nbFichierVal++;
          echo "|Actualite/act".($db->getNbActualite()[0]+1).$_FILES['mesFichiers']['name'][$i];
      }
      $actualite = new Actualite(1,$titre,$imageFond,$date,1,$description,$nomFichier);
      $db->addActualite( $titre, $imageFond, $date,$description, 1, $nomFichier);
    }



    if(isset($_POST['poster'])){
      var_dump($actualite);
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
