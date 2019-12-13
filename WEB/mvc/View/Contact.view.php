<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>
    <link rel="stylesheet" href="../View/Design/Contact.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
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
