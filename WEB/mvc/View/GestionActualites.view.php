<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Actualités</title>
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <link rel="stylesheet" href="../View/Design/GestionInscriptions.css">
    <script type="text/javascript">
      function ConfirmerSuppression(){
        if(confirm("Voulez vous vraiment supprimer cette actualité ?")){
          formulaire.submit();
        }
      }
    </script>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <table class="blueTable">
        <tr>
          <th>Titre</th>
          <th>Auteur</th>
          <th>Date de création</th>
          <th>Action</th>
        </tr>
        <?php foreach ($actualites as $actualite) {?>
          <tr>
            <td><?$actualite->getTitre()?></td>
            <td>
              <form class="../Controler/GestionActualites.ctrl.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="viewAuteur" value="<?$actualite->getNomCrea()?>">
                <input type="hidden" name="idAuteur" value="<?$actualite->getNumCrea()?>">
              </form>
            </td>
            <td><?$actualite->getDateCreation()?></td>
            <td>
              <form action="../Controler/GestionActualites.ctrl.php" method="post" enctype="multipart/form-data" name='formulaire'>
                <input type="submit" name="viewActualite" value="Voir Plus"><br>
                <input type="submit" name="modifActualite" value="Modifier" ><br>
                <input type="submit" name="supprActualite" value="Supprimer" onclick='ConfirmerSuppression()'><br>
                <input type="hidden" name="idActualite" value="<?$actualite->getId()?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
  </body>
</html>
