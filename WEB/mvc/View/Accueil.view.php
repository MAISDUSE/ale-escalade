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
        <h1>Actualitées :</h2>

            <?php foreach ($actualites as $actualite){ ?>
              <section class="actualite">
          		  <div class="actualiteZ3">

      			<div class="txt">
              <!--Ici dans le h3 (titre) on devra limiter le text !!!-->
      			  <h3><?=$actualite->getTitre()?></h1>
      			  <p>Posté le <?=$actualite->getDateCreation()?></p>

              <!--Ici dans le p on devra limiter le text !!!-->
              <p><?= substr($actualite->getDescription(), 0, 120) ?></p>
      			  <a href="#">Afficher l'actualite</a>
      			</div>
    		  </div>

    		  <div class="actualiteZ2">  </div>

    		  <img class="actualiteZ1" src="../Ressources/Actualite/<?=$actualite->getImage()?>" alt="imageDeFonds" >

        </section>
        <?php }?>

      </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
