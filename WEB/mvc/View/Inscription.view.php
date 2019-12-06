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
    <link rel="stylesheet" href="../View/Design/Inscription.css">
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
        <li><a href="../View/Accueil.view.php">Accueil</a></li>
        <li><a href="#">Planning</a></li>
        <li><a href="../View/Inscription.view.php">Inscription</a></li>
        <li><a href="#">Connexion</a></li>
        <li><a href="#">Forum</a></li>
        <li><a href="../View/Contact.view.php">Contact</a></li>

      </ul>
    </nav>


    <section>
      <form class="" action="index.html" method="post">
        <div class="champs">
          <div class="nom">
            <label for="nom">Nom</label>
            <input type="text" name="nom" placeholder="Votre Nom" required>
          </div>
         <br>
            <label for="nom">Prenom</label>
            <input type="text" name="prenom" placeholder="Votre Prenom" required>
         <br>
            <label for="nom">Mot de passe</label>
            <input type="password" name="password" placeholder="Votre Mot de passe" required>
         <br>
           <label for="nom">Date de naissance</label>
           <input type="date" name="age" placeholder="jj/mm/aa" required>
         <br>
            <label for="nom">Adresse</label>
            <input type="text" name="adresse" placeholder="Adresse" required>
         <br>
          <label for="nom">Code Postal</label>
          <input type="text" name="codepostal" placeholder="Ex: 75000" required>
         <br>
           <label for="nom">Email</label>
           <input type="mail" name="mail" placeholder="Email" required>
         <br>
           <label for="base">Assurance</label>
           <div>
             <input type="radio" id="base" name="drone" value="base"
          checked>
          <label for="huey">Base</label>
        </div>

        <div>
          <input type="radio" id="base+" name="drone" value="base+">
          <label for="dewey">Base+</label>
        </div>

        <div>
          <input type="radio" id="base++" name="drone" value="base++">
          <label for="louie">Base++</label>
        </div>

         <br>
         <input type="submit" name="valider" value="Valider">
        </div>



      </form>
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
