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
    <section id="SectionArticle">
      <div class="Article">
        <div class="Titre">
          <h2>Titre article</h2>
        </div>

        <div class="Image">
          <img src="../Ressources/Ale_black.png" alt="TEST">
        </div>

        <div class="Texte">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <div class="LirePlus">
          <a href="#">Lire Plus...</a>
        </div>

      </div>
    </section>

    <section>
      <div class="Article">
        <div class="Titre">
          <h2>Titre article</h2>
        </div>
        <div class="Image">
          <img src="../Ressources/Ale_black.png" alt="TEST">
        </div>

        <div class="Texte">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

        <div class="LirePlus">
          <a href="#">Lire Plus...</a>
        </div>

      </div>
    </section>


    <br><br><br><br><br>

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
  </body>
  <footer id="footer" class="footer-1">
    <div class="main-footer widgets-dark typo-light">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-3" id="divFooter">
            <div class="widget subscribe no-box">
              <h5 class="widget-title">ALE ESCALADE<span></span></h5>
              <p>L'ALE Escalade est une association d'escalade qui opére dans le secteur d'Echirolles</p>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3" id="divFooter">
            <div class="widget no-box">
              <h5 class="widget-title">Quelques Liens Utiles<span></span></h5>
              <ul class="thumbnail-widget">
                <li>
                  <div class="thumb-content"><a href="https://www.ffme.fr/">FFME</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="http://www.echirolles.fr/">Ville d'Echirolles</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="https://www.facebook.com/Sport.Echirolles/">Objectif Sport Echirolles</a></div>
                </li>
                </ul>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3" id="divFooter">
              <div class="widget no-box">
                <h5 class="widget-title">Inscription<span></span></h5>
                <p class="pNul">Inscrivez vous dès maintenant en cliquant sur le lien ci-dessous.</p>
                <a class="btn" href="../Controler/Inscription.ctrl.php" target="_blank">Rejoignez-Nous</a>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-3" id="divFooter">

              <div class="widget no-box">
                <h5 class="widget-title">Contactez nous<span></span></h5>
                <ul class="thumbnail-widget">
                  <li>
                    <div class="thumb-content"><a href="../Controler/Contact.ctrl.php">Page Contact</a></div>
                  </li>
                  <li>
                    <div class="thumb-content"><a href="mailto:info@domain.com" title="glorythemes">info@domain.com</a></div>
                  </li>
                  </ul>
                <ul class="social-footer2">
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="footer-copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p>Copyright ALE-ESCALADE © 1986. All rights reserved.</p>
            </div>
          </div>
        </div>
      </div>
    </footer>
</html>
