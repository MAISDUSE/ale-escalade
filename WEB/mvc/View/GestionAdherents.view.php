<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Adhérents</title>
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <link rel="stylesheet" href="../View/Design/GestionInscriptions.css">
    <script type="text/javascript">
      function ConfirmerSuppression(){
        if(confirm("Voulez vous vraiment supprimer cet adhérent ?")){
          formulaire.submit();
        }
      }
    </script>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <table class="blueTable">
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>N° Téléphone</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        <?php foreach ($adherents as $user) {?>
          <tr>
            <td><?=$user->getNom()?></td>
            <td><?=$user->getPrenom()?></td>
            <td><?=$user->getDateNaissance()?></td>
            <td><?=$user->getNumTel()?></td>
            <td><?=$user->getRole()?></td>
            <td>
              <form action="../Controler/GestionAdherents.ctrl.php" method="post" enctype="multipart/form-data" name='formulaire'>
                <input type="submit" name="viewUser" value="Voir Plus"><br>
                <input type="submit" name="modifUser" value="Modifier" ><br>
                <input type="submit" name="supprUser" value="Supprimer" onclick='ConfirmerSuppression()'><br>
                <input type="hidden" name="idUser" value="<?=$user->getId()?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
  </body>
</html>
