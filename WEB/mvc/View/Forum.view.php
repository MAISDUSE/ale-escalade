<?php
  require_once("../Model/Sujet.class.php");
  $sujet = new Sujet("Test","Un petit s'est fait gommer il y aurait pas de message bande de fils de pute ça va bande","Darkos", date("d/m/Y"));
  $miseEnAmont = substr($sujet->getDescription(),0,20) . "...";
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forum ALE Escalade</title>
  </head>
  <body>
    <header>
      <h1>Bienvenue sur le forum</h1>
    </header>

    <div class="">
      <h2>Liste des sujets de discussions</h2>

      <article class="">
        <h3><?=$sujet->getTitre()?></h3>
        <p><?=$miseEnAmont?> le <?=$sujet->getDate()?></p>

      </article>

    </div>
  </body>
</html>
