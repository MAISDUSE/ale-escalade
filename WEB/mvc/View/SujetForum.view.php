<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../View/Design/SujetForum.css">
  <link rel="stylesheet" href="../View/Design/HeaderFooter.css">

  <title>Forum ALE Escalade</title>
</head>
<body>
  <?php include "Design/Header.view.php"; ?>
  <div class="forum">

    <div class="sujet">
      <h2><?=$sujet1->getTitre()?></h2>
      <p class="date">Posté le : <?=$sujet1->getdatePub()?></p>
      <p class="description">Créateur : <?=$sujet1->getIdAuteur()?></p>
      <p class="description">Contenu : <?=$sujet1->getContenu()?></p>

    </div>
    <br>

      <?php foreach ($liste as $value) {
        ?>
    <div class="commentaires">
        <p>Date : <?=$value->getDate()?></p>
        <p>Auteur : <?=$value->getNumAuteur()?></p>
        <p class="contenu">Contenu : <?=$value->getContenu()?></p>
        <br>
    </div>
        <?php  } ?>



    <!-- zone poste un commentaire !-->
      <br>
      <form class="" action="SujetForum.ctrl.php" method="post">
        <label for="Comment">Veuillez Commenter</label>

        <textarea name="contenu" rows="8" cols="80" placeholder="Commenter" required></textarea><br>
        <input type="submit" name="envoyer" value="Envoyer">
      </form>
    </div>

    <?php include "Design/Footer.view.php"; ?>

  </body>
  </html>
