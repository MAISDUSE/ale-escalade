<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>
    <link rel="stylesheet" href="../View/Design/Contact.css">
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
    </header>
      <div class="wrapper">
        <div class="contact-form">
          <form class="post" action="index.html" method="post">
          <div class="input-fields">
            <input type="text" class="input" placeholder="Nom">
            <input type="text" class="input" placeholder="Prenom">
            <input type="text" class="input" placeholder="Email">
            <input type="text" class="input" placeholder="Sujet">
          </div>
          <div class="message">
            <textarea placeholder="Votre message"></textarea>
            <input type="submit" name="Valider" value="Valider" class="input" >
          </div>
          </form>
        </div>
      </div>

  </body>
</html>
