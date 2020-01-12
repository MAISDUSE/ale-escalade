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
  session_start();
  $db = new DAO;

  if(isset($_SESSION['user'])){
    if(isset($_POST['poster'])){
      $user = $_SESSION['user'];
      $titre = $_POST['titre'];
      $imageFond = "Actualite/default.jpg";


      if(isset($_FILES['imageFond'])){
        if(in_array($_FILES['imageFond']['type'], $formatImage)){
            move_uploaded_file($_FILES['imageFond']['tmp_name'], "../Ressources/Evenement/". $db->getNextNumEvent()."_". $_FILES['imageFond']['name']);
            var_dump($db->getNextNumEvent());
            $imageFond = "Evenement/".$db->getNextNumEvent()."_".$_FILES['imageFond']['name'];
          }else{
            $ErreurPhotoDefault=true;
          }
        }

        $dateCreation =  date('Y-m-d');


        $dateDebut = date('Y-m-d',strtotime($_POST['dateDebut']));

        $dateFin = date('Y-m-d',strtotime($_POST['dateFin']));
        $description = $_POST['description'];

        /*$idUser = getIdUser à coder*/
      $lieu = $_POST['lieu'];

      if(isset($_POST['officiel'])){
        $officiel = "TRUE";
      }else{
        $officiel = "FALSE";

      }



      $db->addEvenement($titre,$imageFond,$dateCreation,$dateDebut,$dateFin,$description,$officiel,$user->getID(),$lieu);
      $_SESSION['reussite'] = new Retour(NULL, TRUE, "Evénement ajouté avec succès");
      $view= new View("../Controler/ListeEvenement.ctrl.php");
      $view->afficher();

      }




      if(!isset($_POST['poster'])){
        $view = new View("CreerEvenement");
        $view->admin = $admin;
        $view->afficher();
      }
}else{
  $_SESSION['erreur'] = new Retour(NULL, TRUE, "Il faut être connecté pour ajouter un événements");
  $view = new View("../Controler/Accueil.ctrl.php");
  $view->afficher();
}


 ?>
