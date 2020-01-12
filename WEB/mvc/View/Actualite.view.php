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
      <h1><?=$actualite->getTitre()?></h1>
      <h2>Posté le <?=$actualite->getDateCreation()?></p>
      <h2>Posté par <?=$actualite->getNomCrea()?> </p>
       <img  src="../Ressources/<?=$actualite->getImage()?>" alt="imageDeFond" >
      <p><?=$actualite->getDescription()?></p>
      <h2>Fichiers :</h2>
      <div class="fichiers">


          <?php foreach ($actualite->getFichiers() as $fichier ){ ?>
        <div class="fichier">
            <a href="../Ressources/<?=$fichier?>" download><img src="
            <?php $info = new SplFileInfo('../Ressources/'.$fichier);
                if ( strtoupper($info->getExtension())=="JPG"||
                     strtoupper($info->getExtension())=="JPEG"||
                     strtoupper($info->getExtension())=="PNG") {
                  echo "../Ressources/".$fichier;
                }else{
                  echo "../Ressources/Icone/".strtoupper($info->getExtension()).".png";

            }?>" alt=""></a>
        <div class="">
          <?=$fichier?>
        </div>
        </div>
        <?php } ?>

      </div>
    </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
