<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Outils d'administration</title>
    
  </head>
  <body>
    <article>
      <div class="">
        <h2>inscriptions en attente</h2>

      </div>

      <div class="">
        <h2>Générer un compte utilisateur</h2>
      </div>

      <div class="">
        <h2>Nouvel article</h2>
        <form action="../Controler/OutilAdministratif.ctrl.php" method="post" enctype="multipart/form-data">

          <textarea id="contenu" name="contenu" rows="8" cols="80" placeholder="Entrez le contenu de votre article"></textarea>
          <label for="fichier">Fichier : </label>
          <input type="file" name="fichier">

          <input type="submit" name="Confirmer">
        </form>
      </div>

    </article>
  </body>
</html>
