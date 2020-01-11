

  <?php
  require_once("../Model/Sujet.class.php");
  require_once("../Model/Commentaire.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");
  require_once("../Framework/Retour.class.php");
  session_start();

  if(isset($_SESSION['user'])){


    $db = new DAO;

    if(!isset($_GET['sujet']) and isset($pageSujet)){
      $sujet1 = $db->getSujetByID($pageSujet);
      $commentaires = $db->getAllCommentairesFomSujet($pageSujet);
    }else{
      $sujet1 = $db->getSujetByID($_GET['sujet']);
      $commentaires = $db->getAllCommentairesFomSujet($_GET['sujet']);
    }




    $view = new View("SujetForum");
    $view->sujet1 = $sujet1;
    $view->liste = $commentaires;
    $view->db = $db;
    $view->afficher();



  }else{
    $retour = new Retour(NULL, TRUE, "Il faut être connecté pour accéder au Forum");
    $_SESSION['erreur'] = $retour;
    $view = new View('../Controler/Accueil.ctrl.php');
    $view->afficher();
  }

  ?>
