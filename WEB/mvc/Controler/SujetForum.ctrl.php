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
//methode pour recup le Sujet a partir de son id
require_once("../Model/Sujet.class.php");
$sujet1 = new Sujet(1,"Test","Un petit s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
 ?>
    <h4><?=$sujet1->getTitre()?></h4>
    <p class="date">Posté le : <?=$sujet1->getDate()?></p>
    <p class="description">Description : <?=$sujet1->getDescription()?></p>
    <p class="description">Créateur : <?=$sujet1->getNomUtilisateur()?></p>


 <?php //zone des commentaire
//recup tout les commentairers depuis id trié par date, plus recent d'abord
// $liste = getCommentaires($Sujet1->getId());

//affiche
?>
<!-- zone poste un commentaire !-->
<br>
<form class="" action="SujetForum.ctrl.php" method="post">


<label for="Comment">Veuillez Commenter</label>
<input type="textfield" name="Comment" placeholder="Commenter">
<input type="submit" name="Envoyer" value="Envoyer">
</form>
</body>
</html>
