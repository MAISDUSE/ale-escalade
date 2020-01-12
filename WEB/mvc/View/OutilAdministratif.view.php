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
        <input type="submit" name="gererEvenements" value="Gerer les evenements"><br>
        <input type="submit" name="gererInscription" value="Gérer les inscriptions en attente"><br>
        <input type="submit" name="gererAdherent" value="Gérer les adhérents"><br>
        <input type="submit" name="gererCours" value="Gérer les cours"><br>
      </form>
      <br>
      <br>
      <a href="../Model/Export.csv.php">
        <button type="button" name="export">Exporter le CSV ...</button>
      </a>
    </div>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
