<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - Gestion Inscriptions</title>
    <script type="text/javascript">
      function ConfirmerRefus(){
        if(confirm("Voulez vous vraiment refuser cette inscription ?")){
          formulaire.submit();
        }
      }

      function ConfirmerAcceptation(){
        if(confirm("Voulez vous vraiment refuser cette inscription ?")){
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
              <form action="../Controler/GestionAdherents.ctrl.php" method="post" enctype="multipart/form-data" name="formulaire">
                <input type="submit" name="accepter" value="Accepter" onclick="ConfirmerAcceptation()"><br>
                <input type="submit" name="refuser" value="Refuser" onclick="ConfirmerRefus()"><br>
                <input type="hidden" name="idInscription" value=<?$user->getId()?>>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
