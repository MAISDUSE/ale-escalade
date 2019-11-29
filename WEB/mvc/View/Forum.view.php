<?php
  require_once("../Model/Sujet.class.php");
  $sujet = new Sujet("Test","Un petit s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
  $miseEnAmont = substr($sujet->getDescription(),0,20) . "...";
 ?>

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


      <article>
        <aside>
          <h4><?=$sujet->getTitre()?></h4>
          <p class="desc"><?=$miseEnAmont?></p>
        </aside>

         <p class="date">Posté le <?=$sujet->getDate()?></p>

      </article>

    </div>
  </body>
</html>
