<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/CreerActualite.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <script src="../Framework/ckeditor/ckeditor.js"></script>
  </head>
  <body>

    <?php include "Design/Header.view.php"; ?>

      <div class="CreerActualite">
        <h2>Ajouter une actualité :</h2>
          <form class="" action="../Controler/CreerActualite.ctrl.php" method="post" enctype="multipart/form-data">
            <div class="input-fields">
              <label for="titre">Titre :</label>
              <input type="text" name="titre" placeholder="Titre" class="input" required>
              <br>
              <label for="imageFond">Image d'illustration : </label>
              <input multiple type="file" name="imageFond">
              <br>
              <label for="description">Description :</label>
              <textarea id="description" name="description" rows="8" cols="80" placeholder="Entrez votre article" required></textarea>

              <br>
              <label for="fichiers">Fichiers à joindre :</label>
              <input id="fichiers" type="file" name="mesFichiers[]" multiple>
              <br>
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
