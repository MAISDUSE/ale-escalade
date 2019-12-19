

  <?php
  require_once("../Model/Sujet.class.php");
  require_once("../Model/Commentaire.class.php");
  require_once("../Model/DAO.class.php");
  require_once("../Framework/View.class.php");


  //methode pour recup le Sujet a partir de son id passé en get
  $sujet1 = new Sujet(1,"Test",date("d/m/Y"),"Un petit s'est fait gommer il y aurait pas de message bande de fils ",15);
///////////////////////////////////////////////////////

  //recup tout les commentairers depuis id trié par date, plus recent d'abord
  // $liste = getCommentaires($Sujet1->getId());

  //test 1 comentaire random
  $comm= new Commentaire(666,1,date(DATE_RSS),"Ah mais ok dac");
  $liste = array($comm,$comm );

///////////////////////////////////////////////////////////////
  //recup le commentaire du form
  if (isset($_POST['envoyer'])){
    //AJOUT DANS BDD
    //EX
  $comm2 = new commentaire(777,1,date(DATE_RSS),$_POST['contenu']);
  array_push($liste,$comm2);
  }

  $view = new View("SujetForum");
  $view->sujet1 = $sujet1;
  $view->liste = $liste;
  $view->Afficher();

  ?>
