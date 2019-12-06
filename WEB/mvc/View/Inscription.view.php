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
    </header>
    <section>
      <h2>Inscription </h2>
      <div class="wrapper">
        <div class="contact-form">
            <form class="" action="index.html" method="post">
              <div class="input-fields">
              <input type="text" name="nom" placeholder="Votre Nom" class="input" required>

              <input type="text" name="prenom" placeholder="Votre Prenom" class="input"  required>

              <input type="password" name="password" placeholder="Votre Mot de passe" class="input" required>
              <p>Date de naissance</p>
              <input type="date" name="age" placeholder="jj/mm/aa" class="input" required>

              <input type="text" name="adresse" placeholder="Adresse" class="input"  required>

              <input type="text" name="codepostal" placeholder="Ex: 75000" class="input" required>

              <input type="mail" name="mail" placeholder="Email" class="input"  required>
         </div>
         <div class="message">
           <label for="base">Assurance</label>
             <input type="radio" id="base" name="drone" value="base" class="input" checked>
           <label for="huey">Base</label>
             <input type="radio" id="base+" name="drone" value="base+" class="input">
           <label for="dewey">Base+</label>
             <input type="radio" id="base++" name="drone" value="base++" class="input">
           <label for="louie">Base++</label>
             <input type="submit" name="valider" value="Valider" class="input">
          </div>
          </form>
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
