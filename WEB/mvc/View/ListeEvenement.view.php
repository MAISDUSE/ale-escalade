<?php
  require_once("../Model/Evenement.class.php");

 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Listevalue.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
    <a href="../Controler/CreerEvenement.ctrl.php"><h2>Créer un évenement</h2></a>
    <?php foreach ($events as $value) : ?>
      <section>
        <div class="officiel">
          <h1><?=$value->getNom()?></h1>
          <?php if($value->get) ?>
        </div>
        <h2>Posté le <?=date("d/m/Y",strtotime($value->getDateCreation()))?></h2>
        <h2>Posté par <?=$value->getNumCrea()?> </h2>
        <h2>Date de début : <?=date("d/m/Y",strtotime($value->getDateDebut()))?></h2>
        <h2>Durée : <?php print($value->getDuree());if($value->getDuree()>1){print(" jours");}else{print(" jour");}?></h2>
        <h2>Lieu : <?=$value->getNomLieu()?></h2>
        <img  src="../Ressources/<?=$value->getImage()?>" alt="imageDeFond" >
        <p><?=substr($value->getDescription(),0,40) . "..."?></p>
      </section>
    <?php endforeach; ?>
    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
