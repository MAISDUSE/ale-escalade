<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Model/Actualite.class.php");

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
    /*$date = getDate() à coder*/
    /*$idUser = getIdUser à coder*/

    $descrition = $_POST['description'];
    $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
    $nomFichier = array();
      for ($i=0; $i < $nbFichier ; $i++) {
        if (in_array($_FILES['imageFond']['type'], $formatImage) || in_array($_FILES['imageFond']['type'], $formatText)) {
          move_uploaded_file($_FILES['mesFichiers']['tmp_name'][$i], "../Ressources/test2/".$_FILES['mesFichiers']['name'][$i]);
          array_push($nomFichier,"test2/".$_FILES['mesFichiers']['name'][$i]);
        }else{
          $ErreurFormat = true;
        }
      }
      $actualite = new Actualite(1,$titre,$imageFond,"11/12/2019",1,$descrition,$nomFichier);
    }

    if(isset($_POST['previsualiser'])){
      $boolPrevusaliser = true;

        /*$idActualite = getProchainId() à coder*/
        $titre = $_POST['titre'];
        $imageFond = "Actualite/default.jpg";
        if(isset($_FILES['imageFond'])){
          if(in_array($_FILES['imageFond']['type'], $formatImage)){
              $imageFond = $_FILES['imageFond']['tmp_name'];
          }else{
            $ErreurPhotoDefault=true;
        }
        }
        /*$date = getDate() à coder*/
        /*$idUser = getIdUser à coder*/
        $descrition = $_POST['description'];
        $nbFichier = count($_FILES['mesFichiers']['tmp_name']);
        $nomFichier = array();
          for ($i=0; $i < $nbFichier ; $i++) {
            if (in_array($_FILES['imageFond']['type'], $formatImage) || in_array($_FILES['imageFond']['type'], $formatText)) {
              array_push($nomFichier,$_FILES['imageFond']['tmp_name']);
            }else{
              $ErreurFormat = true;
            }
          }
          $actualite = new Actualite(1,$titre,$imageFond,"11/12/2019",1,$descrition,$nomFichier);

        }



    if(isset($_POST['poster'])){
      $view = new View("Actualite");
      $view->actualite  = $actualite;
      $view->afficher();
    }else if(isset($_POST['previsualiser'])){
      $view = new View("CreerActualite");
      $view->ErreurPhotoDefault = $ErreurPhotoDefault;
      $view->ErreurFormat= $ErreurFormat;
      $view->prevusaliser= $boolPrevusaliser ;
      $view->actualite  = $actualite;

      $view->afficher();
    }else{
      $view = new View("CreerActualite");
      $view->ErreurPhotoDefault = $ErreurPhotoDefault;
      $view->ErreurFormat= $ErreurFormat;
      $view->prevusaliser= $boolPrevusaliser ;
      $view->actualite  = $actualite;
      $view->afficher();
    }



 ?>
