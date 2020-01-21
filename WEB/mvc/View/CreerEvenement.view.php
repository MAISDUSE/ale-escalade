<?php
  require_once("../Model/Utilisateur.class.php");
  session_start();
  $admin = $_SESSION['user']->isAdmin();
 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/CreerEvenement.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <script src="../Framework/ckeditor/ckeditor.js"></script>


  </head>
  <body>

    <?php include "Design/Header.view.php"; ?>

      <div class="CreerEvenement">
        <h2>Ajouter un Evenement :</h2>
          <form class="" action="../Controler/CreerEvenement.ctrl.php" method="post" enctype="multipart/form-data">
            <div class="input-fields">
              <label for="titre">Titre :</label>
              <input type="text" name="titre" placeholder="Titre" class="input" required>
              <br>
              <label for="dateDebut">Date de début :</label>
              <input type="date" name="dateDebut" value="<?= date('Y-m-j', strtotime('+1 day'))?>" min="<?= date('Y-m-j')?>" required>
              <br>
              <label for="dateFin">Date de Fin :</label>
              <input type="date" name="dateFin" value="<?= date('Y-m-j', strtotime('+1 day'))?>" min="<?= date('Y-m-j')?>" required>
              <br>
              <label for="imageFond">Image d'illustration : </label>
              <input multiple type="file" name="imageFond">
              <br>
              <label for="lieu">Lieu : </label>
              <input type="text" name="lieu" placeholder="Lieu" required>
              <br>
              <label for="description">Description :</label>
              <textarea id="description" name="description" rows="8" cols="80" placeholder="Entrez la description de votre événement" required></textarea>
              <br>
              <?php

              if ($admin=="TRUE"){
                echo " <label for=\"officiel\">Coché si c'est officiel :</label>";
                echo "<input type=\"checkbox\" name=\"officiel\" value=\"1\">";
                echo "<br>";
              }
               ?>

              <input type="submit" name="poster" value="Poster" class="input">
            </div>
        </form>
    </div>

    <?php include "Design/Footer.view.php"; ?>
    <script>
      CKEDITOR.replace("description");
    </script>

  </body>

</html>
