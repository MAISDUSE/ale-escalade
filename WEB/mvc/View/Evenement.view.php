<?php
  require_once("../Model/Evenement.class.php");
  require_once("../Model/Utilisateur.class.php");
  require_once("../Model/DAO.class.php");

  $db = new DAO;
  $evenement = $db->getEventByID($_GET['id']);
  $userCreateur = $db->getUserByID($evenement->getNumCrea());

 ?>

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
      <h2>Posté le <?=date("d/m/Y",strtotime($evenement->getDateCreation()))?></h2>
      <h2>Posté par <?=$userCreateur->getPrenom() . " " . $userCreateur->getNom() ?> </h2>
      <h2>Date de début : <?=date("d/m/Y",strtotime($evenement->getDateDebut()))?></h2>
      <h2>Durée : <?php print($evenement->getDuree());if($evenement->getDuree()>1){print(" jours");}else{print(" jour");}?></h2>
      <h2>Lieu : <?=$evenement->getNomLieu()?></h2>
       <img  src="../Ressources/<?=$evenement->getImage()?>" alt="imageDeFond" >
      <p><?=$evenement->getDescription()?></p>

    </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
