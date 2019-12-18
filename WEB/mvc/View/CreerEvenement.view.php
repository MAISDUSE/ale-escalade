<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/CreerActualite.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <!--
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>
  tinymce.init({
    selector: 'textarea',  // change this value according to your HTML
    menubar: false,
    toolbar: 'undo redo | fontsizeselect | bold italic underline',

    });

  </script>-->
  </head>
  <body>

    <?php include "Design/Header.view.php"; ?>

      <div class="CreerActualite">
        <h2>Ajouter une actualité :</h2>
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
              <textarea id="description" name="description" rows="8" cols="80" placeholder="Entrez la description de votre actulité" required></textarea>
              <br>
              <?php if ($admin==true){
                echo " <label for=\"officiel\">Pris en charge :</label>";
                echo "<input type=\"checkbox\" name=\"officiel\" value=\"1\">";
                echo "<br>";
              }
               ?>

              <input type="submit" name="poster" value="Poster" class="input">
            </div>
        </form>
    </div>

    <?php include "Design/Footer.view.php"; ?>


  </body>

</html>
