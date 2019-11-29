<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../View/Design/Forum.css">
    <title>Forum ALE Escalade</title>
  </head>
  <body>
    <header>
      <h1>Bienvenue sur le forum</h1>
    </header>

    <h2>Liste des sujets de discussions</h2>
    <div class="listeSujet">


<?php foreach ($listeSujet as $value){
  $tmp = $value[0]->getTitre();
  ?>


  <a href="../Controler/SujetForum.ctrl.php?sujet=<?=$titre?>">
    <aside>
      <h4><?=$titre?></h4>
      <p class="desc"><?=$value[1]?></p>
    </aside>

    <p class="date">Posté le <?=$value[0]->getDate()?></p>

  </a>

<?php
} ?>



    </div>
  </body>
</html>
