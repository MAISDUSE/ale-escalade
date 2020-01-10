<?php
//require_once("../Model/Article.class.php");
require_once("../Model/Utilisateur.class.php");
require_once("../Model/DAO.class.php");
require_once("../Framework/View.class.php");


/*
    ICI METTRE CODE POUR TESTER L'EXISTENCE DU COMPTE
*/



if(isset($_POST['mail']) && isset($_POST['passwd'])){

  $mail = $_POST['mail'];
  $mdp = $_POST['passwd'];
  var_dump($mail);
  var_dump($mdp);


  $db = new DAO;
  $resultat = $db->verifUser($mail, $mdp);

  if(!$resultat->erreur){
    session_start();

    $_SESSION['user'] = new Utilisateur($resultat[1],$resultat[2],$resultat[3]
                                      ,$resultat[4],$resultat[5],$resultat[6]);

    var_dump($_SESSION['user']);
    session_write_close();



  }else{
    var_dump($resultat);
  }

}else{
  $view = new View("Connexion");
  $view->afficher();
}



//$view->page = $page;
//$view->page = $nomUtilisateur
//$view->page = $passeportUtilisateur


?>
