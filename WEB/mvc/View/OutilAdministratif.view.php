<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Inscription.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <div class="elements">

      <article class="">
        <h2>Inscriptions en attente</h2>

      </article>

      <article class="">
        <h2>Générer un compte utilisateur</h2>
      </article>

      <article class="addArticle">
        <h2>Nouvel article</h2>
        <form action="../Controler/OutilAdministratif.ctrl.php" method="post" enctype="multipart/form-data">
          <textarea id="contenu" name="contenu" rows="8" cols="80" placeholder="Entrez le contenu de votre article" required></textarea>
          <br>
          <label for="fichier">Fichiers à joindre : </label>
          <input multiple type="file" name="fichier">
          <input type="submit" name="Confirmer" value="Publier" >
        </form>
      </article>

    </div>
  </body>
</html>
