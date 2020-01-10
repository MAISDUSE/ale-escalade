<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Cours</title>
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <script type="text/javascript">
      function ConfirmerSuppression(){
        if(confirm("Voulez vous vraiment supprimer ce cours ?")){
          formulaire.submit();
        }
      }
    </script>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <table>
        <tr>
          <th>Nom</th>
          <th>Entraineur</th>
          <th>Nb Places</th>
          <th>Jour</th>
          <th>Horaires</th>
          <th>Action</th>
        </tr>
        <?php foreach ($cours as $uncours) {?>
          <tr>
            <td><?$unCours->getNom()?></td>
            <td>
              <form class="../Controler/GestionCours.ctrl.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="viewAuteur" value="<?$uncours->getNomEntraineur()?>">
                <input type="hidden" name="idAuteur" value="<?$uncours->getNumEntraineur()?>">
              </form>
            </td>
            <td><?$unCours->getNbPlace()?></td>
            <td><?$unCours->getJour()?></td>
            <td><?$unCours->getHeureDebut()?> - <?$unCours->getHeureFin()?></td>
            <td>
              <form action="../Controler/GestionCours.ctrl.php" method="post" enctype="multipart/form-data" name='formulaire'>
                <input type="submit" name="viewCours" value="Voir Plus"><br>
                <input type="submit" name="modifCours" value="Modifier" ><br>
                <input type="submit" name="supprCours" value="Supprimer" onclick='ConfirmerSuppression()'><br>
                <input type="hidden" name="idCours" value="<?$uncours->getId()?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
