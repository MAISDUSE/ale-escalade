<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ALE Escalade - <?$adherent->getNom()?></title>
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <section>
      <div class="col1">
        <h1>Civilité</h1>
        <p>Nom : <?$adherent->getNom()?></p>
        <p>Prénom : <?$adherent->getPrenom()?></p>
        <p>Date de naissance : <?$adherent->getDateNaissance()?></p>
        <p>Sexe : <?$adherent->getGenre()?></p>
      </div>
      <div class="col2">
        <h1>Contacts</h1>
        <p>Adresse : <?$adherent->getAdresse()?></p>
        <p>Adresse Mail : <?$adherent->getAdresseMail()?></p>
        <p>N° Téléphone : <?$adherent->getNumTel()?></p>
        <h2>Personne à contacter en cas d'urgence : </h2>
        <p>Nom : <?$adherent->getContact()->getNom()?></p>
        <p>Prénom : <?$adherent->getContact()->getPrenom()?></p>
        <p>Adresse : <?$adherent->getAdresse()->getAdresse()?></p>
        <p>Adresse Mail : <?$adherent->getContact()->getAdresseMail()?></p>
        <p>N° Téléphone : <?$adherent->getContact()->getNumTel()?></p>
      </div>
      <div class="col3">
        <h1>Escalade</h1>
        <p>N° Licence : <?$adherent->getLicence()?></p>
        <p>Type Licence : <?$adherent->getTypeLicence()?></p>
        <p>Passeport : <?$adherent->getPasseport()?></p>
      </div>
    </section>
    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
