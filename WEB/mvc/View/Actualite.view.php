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

    <?php $a1 = array("act1_2.jpg","act1_3.jpg","act1_4.pdf");
    $a2 = array("act2_2.jpg","act2_3.jpg");
    require_once("../Model/Actualite.class.php");

    $actualite = new Actualite(1,"Compte Rendu de la réunion du 10/12/2019","act2_1.jpg","11/12/2019",
                        1,"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                          sed do eiusmod tempor incididunt ut labore et dolore magna
                          aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                          ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          Duis aute irure dolor in reprehenderit in voluptate velit
                          esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                          occaecat cupidatat non proident, sunt in culpa qui officia
                          deserunt mollit anim id est laborum.",$a1);
    $ac2 = new Actualite(2,"Podium des jeune à Chamonix","act2_1.jpg","25/10/2019",
                       1,"Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                       sed do eiusmod tempor incididunt ut labore et dolore magna
                       aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                       ullamco laboris nisi ut aliquip ex ea commodo consequat.
                       Duis aute irure dolor in reprehenderit in voluptate velit
                       esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                       occaecat cupidatat non proident, sunt in culpa qui officia
                       deserunt mollit anim id est laborum.",$a2);


    $view = new View("Accueil"); ?>

    <section>
      <h1><?=$actualite->getTitre()?></h1>
      <h2>Posté le <?=$actualite->getTitre()?></p>
      <h2>Posté par <?=$actualite->getNomCrea()?> </p>
       <img  src="../Ressources/Actualite/<?=$actualite->getImage()?>" alt="imageDeFond" >
      <p><?=$actualite->getDescription()?></p>
      <h2>Fichiers :</h2>
      <div class="fichiers">


          <?php foreach ($a1 as $key ){ ?>
        <div class="fichier">
            <a href="../Ressources/Actualite/<?=$key?>" download><img src="
            <?php $info = new SplFileInfo('../Ressources/Actualite/'.$key);
                if ( strtoupper($info->getExtension())=="JPG"||
                     strtoupper($info->getExtension())=="JPEG"||
                     strtoupper($info->getExtension())=="PNG") {
                  echo "../Ressources/Actualite/".$key;
                }else{
                  echo "../Ressources/Icone/".strtoupper($info->getExtension()).".png";

            }?>" alt=""></a>
              <p><?=$key?></p>
        </div>
        <?php } ?>

      </div>
    </section>

    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
