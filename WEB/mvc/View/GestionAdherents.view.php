<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Adhérents</title>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <table>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>N° Téléphone</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        <?php foreach ($users as $user) {?>
          <tr>
            <td><?$user->getNom()?></td>
            <td><?$user->getPrenom()?></td>
            <td><?$user->getDateNaissance()?></td>
            <td><?$user->getNumTel()?></td>
            <td><?$user->getRole()?></td>
            <td>
              <form action="../Controler/GestionAdherents.ctrl.php" method="post" enctype="multipart/form-data">
                <input type="submit" name="viewUser" value="Voir Plus"><br>
                <input type="submit" name="modifUser" value="Modifier" ><br>
                <input type="submit" name="supprUser" value="Supprimer"><br>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
