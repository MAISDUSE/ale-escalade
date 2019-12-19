<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <link rel="stylesheet" href="../View/Design/OutilAdministratif.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <div class="outils">
        <h2>Outils :</h2>
        <form action="../Controler/OutilAdministratif.ctrl.php" method="post" enctype="multipart/form-data">
          <input type="submit" name="ajouterActualite" value="Ajouter une actualité" ><br>
          <input type="submit" name="gererActualite" value="Gerer les actualités"><br>
          <input type="submit" name="voirInscription" value="Voir les inscription en attente"><br>
          <input type="submit" name="gererInsciption" value="Gérer les inscritions en attente"><br>
          <input type="submit" name="gererAdherent" value="Gérer les adherents"><br>
          <input type="submit" name="gereCours" value="Gérer les cours"><br>
          <input type="submit" name="" value=""><br>
        </form>
    </div>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
