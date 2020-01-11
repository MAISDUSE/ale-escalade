<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../View/Design/Forum.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">

    <title>Forum ALE Escalade</title>
  </head>
  <body>
<?php include "Design/Header.view.php"; ?>

    <div class="listeSujet">
      <div class="entete">
        <h2>Liste des sujets de discussions</h2>
        <a href="../Controler/CreerSujet.ctrl.php" class="creer_sujet"><h2>Créer un sujet</h2></a>

      </div>


<?php foreach ($listeSujet as $value){
  $tmp = $value[0]->getTitre();
  ?>


  <a href="../Controler/SujetForum.ctrl.php?sujet=<?=$value[0]->getId()?>">
    <aside>
      <h4><?=$value[0]->getTitre()?></h4>
      <p class="desc"><?=$value[1]?></p>
    </aside>

    <p class="date">Posté le <?=$value[0]->getdatePub()?></p>

  </a>

<?php
} ?>



    </div>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
