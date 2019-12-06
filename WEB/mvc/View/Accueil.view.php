<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>
    <script>
    /*var looper;
    var degrees = 0;
    var pos = 0;
    function rotateAnimation(el,speed){
    	var elem = document.getElementById(el);
    	elem.style.MozTransform = "rotate("+degrees+"deg)";
    	looper = setTimeout('rotateAnimation(\''+el+'\','+speed+')',speed);
    	degrees++;
    	if(degrees >= 180){
    		degrees = 180;
          if (pos == 300) {
            elem.style.top = pos + 2*window.scrollY + 'px';
          } else {
            pos++;
            elem.style.top = pos + 'px';
          }
    }
  }

    	//document.getElementById("status").innerHTML = "rotate("+degrees+"deg)";
      */
    </script>
    <link rel="stylesheet" href="../View/Design/Accueil.css">
  </head>
  <body>
    <header>
      <img src="../Ressources/Ale_black.png" alt="TEST" id="1">
      <script>
        rotateAnimation("1",20);
      </script>
      <h1>ALE-ESCALADE</h1>
    </header>

    <nav>
      <ul>
        <li><a href="../../View/Design/Accueil.view.php">Accueil</a></li>
        <li><a href="#">Planning</a></li>
        <li><a href="../../View/Design/Inscription.view.php">Inscription</a></li>
        <li><a href="../../View/Design/Connexion.view.php">Connexion</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="#">Contact</a></li>

      </ul>
    </nav>

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
</html>
