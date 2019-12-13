<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Accueil.css">
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
      <!-- Bouton de scrolling animé via CSS (NE PAS TOUCHER) -->
      <div class="box">
        <a href="#SectionArticle">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!--FIN DE LA SECTION DU BOUTON DE SCROLLING-->

    </header>
    <div class="agenda">
      <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23EF6C00&amp;ctz=Europe%2FParis&amp;src=MmpzMzhoMWFiamNnYTQxYjlvOG1zb2czaHNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%238A2D38&amp;showTz=0&amp;showCalendars=0&amp;showTabs=1&amp;showNav=1&amp;showDate=1&amp;mode=WEEK" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>
