<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Inscription.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">

  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <section>

      <div class="wrapper">

        <div class="contact-form">
          <h2>Inscription </h2>
            <form class="" action="index.html" method="post">
              <div class="input-fields">
              <label for="nom">Nom : </label>
              <input type="text" name="nom" placeholder="Votre Nom" class="input" required>
              <label for="prenom">Prénom : </label>
              <input type="text" name="prenom" placeholder="Votre Prenom" class="input"  required>
              <label for="sexe">Sexe : </label>
              <input type="radio" id="homme" name="sexe" value="Homme" checked>
              <label for="homme">Homme</label>
              <input type="radio" id="femme" name="sexe" value="Femme">
              <label for="femme">Femme</label>
              <br>
              <label for="passeport">Passeport : </label>
              <select class="input" name="passeport">
                <option value="Blanc" selected>Blanc</option>
                <option value="Jaune">Jaune</option>
                <option value="Orange">Orange</option>
                <option value="Vert">Vert</option>
                <option value="Bleu">Bleu</option>
                <option value="RougePer">Rouge Performance</option>
                <option value="RougeGE">Rouge Grands Espaces</option>
                <option value="Noir">Noir</option>
              </select>
              <label for="password">Mot de passe : </label>
              <input type="password" name="password" placeholder="Votre Mot de passe" class="input" required>
              <label for="age">Date de naissance : </label>
              <input type="date" name="age" placeholder="jj/mm/aa" class="input" required>
              <label for="adresse">Adresse : </label>
              <input type="text" name="adresse" placeholder="Adresse" class="input"  required>
              <label for="codepostal">Code Postal : </label>
              <input type="text" name="codepostal" placeholder="Ex: 75000" class="input" required>
              <label for="mail">Adresse mail :</label>
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
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
