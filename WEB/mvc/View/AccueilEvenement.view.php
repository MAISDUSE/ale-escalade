<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/AccueilEvenement.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <section class="listeEvenement">
        <h1>Les évenements :</h1>
        <form class="creerEvenement" action="../Controler/CreerEvenement.ctrl.php" method="post">
            <div class="boutonCreer">
              <input type="submit" name="creer" value="Ajouter un évenement">
            </div>
        </form>
            <?php foreach ($evenements as $evenement){ ?>
              <section class="evenement">
          		  <div class="evenementZ3">
          			<div class="txt">
                  <!--Ici dans le h3 (titre) on devra limiter le text !!!-->
          			  <h3><?=$evenement->getNom()?></h3>
          			  <p>Posté le <?=date("d/m/Y",strtotime($evenement->getDateCreation()))?></p>
                  <p>Prévu le <?=date("d/m/Y",strtotime($evenement->getDateDebut()))?></p>
                  <p><?php if($evenement->getOfficiel() == "TRUE"){ echo "Evenement pris en charge par le club";}else{echo "Evenement non pris en charge par le club";} ?></p>
          			  <a href="../Controler/Evenement.ctrl.php?id=<?=$evenement->getId()?>" class="afficheEvent">Afficher l'evenement</a>
          			</div>
        		  </div>

        		  <div class="<?php if($evenement->getOfficiel()){ echo "evenementZ2o";}else{echo "evenementZ2";} ?>">  </div>

        		  <img class="evenementZ1" src="../Ressources/<?=$evenement->getImage()?>" alt="imageDeFonds" >

        </section>
        <?php }?>

      </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
