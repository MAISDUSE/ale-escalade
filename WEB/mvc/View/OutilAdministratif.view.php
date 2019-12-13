<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Inscription.css">
  </head>
  <body>
    <header>
      <div class="menu-toggle" id="hamburger">
          <i class="fas fa-bars"></i>
      </div>
      <div class="overlay"></div>
      <div class="container">
          <nav>
              <h1 class="brand"><a href="../Controler/Accueil.ctrl.php"><img src="../Ressources/Ale_black.png" alt="Logo Ale"></h1>
              <ul>
                  <li><a href="../Controler/Accueil.ctrl.php">Accueil</a></li>
                  <li><a href="../Controler/Accueil.ctrl.php">Planning</a></li>
                  <li><a href="../Controler/Inscription.ctrl.php">Inscription</a></li>
                  <li><a href="../Controler/Connexion.ctrl.php">Connexion</a></li>
                  <li><a href="../Controler/Forum.ctrl.php">Forum</a></li>
                  <li><a href="../Controler/Contact.ctrl.php">Contact</a></li>
              </ul>
          </nav>
      </div>
    <script>
    function myMove() {
      var elem = document.getElementById("myAnimation");
      var pos = 0;
      var id = setInterval(frame, 10);
      function frame() {
        if (pos == 180) {
          clearInterval(id);
        } else {
          pos++;
          elem.style.top = pos + 'px';

        }
      }
    }
    </script>
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
  </header>
    <br><br><br><br><br>
  </body>
</html>
