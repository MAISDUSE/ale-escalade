<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Actualite.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>

    <section>
      <h1><?=$evenement->getNom()?></h1>
      <h2>Posté le <?=$evenement->getDateCreation()?></h2>
      <h2>Posté par <?=$evenement->getNumCrea()?> </h2>
      <h2>Date de début : <?=$evenement->getDateDebut()?></h2>
      <h2>Durée : <?php print($evenement->getDuree());if($evenement->getDuree()>1){print(" jours");}else{print(" jour");}?></h2>
      <h2>Lieu : <?=$evenement->getNomLieu()?></h2>
       <img  src="../Ressources/<?=$evenement->getImage()?>" alt="imageDeFond" >
      <p><?=$evenement->getDescription()?></p>

    </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
