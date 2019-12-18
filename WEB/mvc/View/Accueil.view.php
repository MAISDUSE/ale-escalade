<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Accueil.css">
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>
      <section class="listeActualite">
        <h1>Actualitées :</h1>

            <?php foreach ($actualites as $actualite){ ?>
              <section class="actualite">
          		  <div class="actualiteZ3">

      			<div class="txt">
              <!--Ici dans le h3 (titre) on devra limiter le text !!!-->
      			  <h3><?=$actualite->getTitre()?></h3>
      			  <p>Posté le <?=$actualite->getDateCreation()?></p>

      			  <a href="../Controler/Actualite.ctrl.php?id=<?=$actualite->getId()?>">Afficher l'actualitée</a>
      			</div>
    		  </div>

    		  <div class="actualiteZ2">  </div>

    		  <img class="actualiteZ1" src="../Ressources/<?=$actualite->getImage()?>" alt="imageDeFonds" >

        </section>
        <?php }?>

      </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
