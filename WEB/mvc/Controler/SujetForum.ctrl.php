<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../View/Design/SujetForum.css">
  <title>Forum ALE Escalade</title>
</head>
<body>
  <header>
    <?php $titre = $_GET['sujet'] ?>
    <h1><?=$titre?></h1>
  </header>

  <?php
  require_once("../Model/Sujet.class.php");
  require_once("../Model/Commentaire.class.php");


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
  if (isset($_POST['Comment'])){
    //AJOUT DANS BDD
    //EX
  $comm2 = new commentaire(777,1,date(DATE_RSS),$_POST['Comment']);
  array_push($liste,$comm2);
  }

  ?>
  <div class="sujet">
    <h4><?=$sujet1->getTitre()?></h4>
    <p class="date">Posté le : <?=$sujet1->getdatePub()?></p>
    <p class="description">Créateur : <?=$sujet1->getIdAuteur()?></p>
    <p class="description">Contenu : <?=$sujet1->getContenu()?></p>

  </div>
<br>


  <?php //zone des commentaire

  //affiche les commentairers
  ?>
  <div class="commentaires">
    <?php foreach ($liste as $value) {
      ?>
      <p>Date : <?=$value->getDate()?></p>
      <p>Auteur : <?=$value->getNumAuteur()?></p>
      <p>Contenu : <?=$value->getContenu()?></p>
      <br>

      <?php  } ?>

    </div>

    <!-- zone poste un commentaire !-->
    <br>
    <form class="" action="SujetForum.ctrl.php" method="post">
      <label for="Comment">Veuillez Commenter</label>
      <input type="textfield" name="Comment" placeholder="Commenter">
      <input type="submit" name="Envoyer" value="Envoyer">
    </form>
  </body>
  </html>
