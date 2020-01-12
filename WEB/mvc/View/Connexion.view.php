<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <link rel="stylesheet" href="../View/Design/Connexion.css">

  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <div class ="section">
        <div class="wrapper">
          <h2>Connexion </h2>

            <form action="../Controler/Connexion.ctrl.php" method="post">
              <?php if(isset($_SESSION['erreur'])) : ?>
                <p class="MessgErreur"><?=$_SESSION['erreur']?></p>
              <?php
                  unset($_SESSION['erreur']);
                  endif; ?>
              <div class="input-fields">
               <label for="mail">Mail : </label>
               <input type="email" name="mail" placeholder="Votre Mail" class="input" required>
               <label for="passwd">Mot de passe : </label>
               <input type="password" name="passwd" placeholder="Votre Mot de passe" class="input" required>

               <div class="valider">
                <input type="submit" name="valider" value="Connexion" class="input btnValider" id=Valider>
               </div>
             </div>
            </form>
          </div>
        </div>
        <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
