<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Inscriptions</title>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <table>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>N° Téléphone</th>
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
                <input type="submit" name="Accepter" value="Accepter"><br>
                <input type="submit" name="Refuser" value="Refuser" ><br>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
