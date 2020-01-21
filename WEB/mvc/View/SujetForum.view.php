<!DOCTYPE html>

<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../View/Design/SujetForum.css">
  <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
  <script src="../Framework/ckeditor/ckeditor.js"></script>

  <title>Forum ALE Escalade</title>
</head>
<body>
  <?php include "Design/Header.view.php"; ?>
  <div class="forum">

    <div class="sujet">
      <h2><?=$sujet1->getTitre()?></h2>

    </div>
    

    <div class="commentaires">
        <div class="flexcomm">
          <div class="entete">
            <p>Date : <?=$sujet1->getdatePub()?></p>
            <p>Créateur : <?php $createur = $db->getUserByID($sujet1->getIdAuteur());
                                                printf($createur->getPrenom() . " " . $createur->getNom());?></p></p>
          </div>
          <div class="contenu"> <?=$sujet1->getContenu()?></div>
        </div>
      </div>

      

      <?php foreach ($liste as $value) :
        $user = $db->getUserByID($value->getNumAuteur());
        $prenom = $user->getPrenom();
        $nom = $user->getNom();?>
        <div class="commentaires">
          <div class="flexcomm">
            <div class="entete">
              <p>Date : <?=$value->getDateCreation()?></p>
              <p>Auteur : <?=$prenom . ' ' . $nom?></p>
            </div>
            <div class="contenu"> <?=$value->getContenu()?></div>
          </div>
        </div>
      <?php  endforeach; ?>



    <!-- zone poste un commentaire !-->
      <br>
      <form class="" action="../Controler/AddCommentaire.ctrl.php" method="post">
        <label for="numsujet"></label>
        <input type="number" name="sujet" value="<?=$sujet1->getId()?>" hidden required readonly>
        <label for="Comment">Nouveau commentaire :</label>
        <textarea name="contenu" rows="8" cols="80" placeholder="Commenter" required></textarea><br>
        <input type="submit" name="envoyer" value="Envoyer">
      </form>
    </div>

    <?php include "Design/Footer.view.php"; ?>
    <script>
      CKEDITOR.replace("contenu");
    </script>

  </body>
  </html>
