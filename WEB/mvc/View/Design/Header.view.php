<?php session_start();
  require_once("../Framework/Retour.class.php");

?>



<header>
  <div class="menu-toggle" id="hamburger">
    <label for="toggle">&#9766;</label>
  </div>
  <div class="overlay"></div>
  <div class="nav">
    <label for="toggle" class="hamburger">&#9776;</label>
    <input type="checkbox" id="toggle">
    <div id="menu" class="container">
        <nav>
            <h1 class="brand"><a href="../Controler/Accueil.ctrl.php"><img src="../Ressources/Ale_black.png" alt="Logo Ale"></a></h1>
            <ul>
                <li><a href="../Controler/Accueil.ctrl.php">Accueil</a></li>
                <li><a href="../Controler/Planning.ctrl.php">Planning</a></li>
                <li><a href="../Controler/Inscription.ctrl.php">Inscription</a></li>
                <?php if(!isset($_SESSION['user'])) :?>
                  <li><a href="../Controler/Connexion.ctrl.php">Connexion</a></li>
                <?php else : ?>
                <li><a href="../Controler/Deconnexion.ctrl.php">Déconnexion</a></li>
                <?php endif; ?>

                <li><a href="../Controler/Forum.ctrl.php">Forum</a></li>
                <li><a href="../Controler/Contact.ctrl.php">Contactez-Nous</a></li>

            </ul>
        </nav>
    </div>

    <?php
      if(isset($_SESSION['reussite'])) : ?>
        <p class="reussite"><?=$_SESSION['reussite']->getRes()?></p>
    <?php
        unset($_SESSION['reussite']);
      endif; ?>

      <?php
        if(isset($_SESSION['erreur'])) : ?>
          <p class="erreur"><?=$_SESSION['erreur']->getRes()?></p>
      <?php
          unset($_SESSION['erreur']);
        endif; ?>


  </div>



</header>

<?php session_write_close(); ?>
