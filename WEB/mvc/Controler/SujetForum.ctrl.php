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
//methode pour recup le Sujet a partir de son titre
require_once("../Model/Sujet.class.php");
$sujet1 = new Sujet(1,"Test","Un petit s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
 ?>



    <aside>
      <h4><?=$sujet1->getTitre()?></h4>
    </aside>

    <p class="date">Posté le : <?=$sujet1->getDate()?></p>
    <p class="description">Description : <?=$sujet1->getDescription()?></p>




</body>
</html>
