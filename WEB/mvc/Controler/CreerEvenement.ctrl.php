<?php
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");
require_once("../Model/Evenement.class.php");

  $formatImage = array("image/jpeg","image/jpg","image/png");
  $formatText = array(".pdf",".txt",".doc",".docx",".csv",".odt");

  $ErreurPhotoDefault = false;
  $admin = false;

/*Faire fonction qui permet de savoir si le mec connecter est un admin*/

  if(isset($_POST['poster'])){
    /*$idEvent = getProchainId() à coder*/
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

    $dateCreation =  date('j/m/Y');


    $dateDebut = date('j/m/Y',strtotime($_POST['dateDebut']));

    var_dump($dateDebut);

    $dateFin = date('j/m/Y',strtotime($_POST['dateFin']));
    var_dump($dateFin);
    $descrition = $_POST['description'];

    /*$idUser = getIdUser à coder*/
    $lieu = $_POST['lieu'];

    if(isset($_POST['officiel'])){
      $officiel = true;
    }else{
      $officiel = false;

    }

      $evenement = new Evenement($titre,$imageFond,$dateCreation,$dateDebut,$dateFin,$descrition,1,$lieu,$officiel);
      $evenement.addToBD();
    }




    if(isset($_POST['poster'])){
      $view = new View("Evenement");
      $view->evenement  = $evenement;
      $view->afficher();
    }else{
      $view = new View("CreerEvenement");
      $view->admin = $admin;
      $view->afficher();
    }



 ?>
