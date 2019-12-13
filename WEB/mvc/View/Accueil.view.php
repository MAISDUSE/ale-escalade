<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>

    <link rel="stylesheet" href="../View/Design/Accueil.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>

    <section class="actualite">

		  <div class="actualiteZ3">
  			<div class="txt">
          <!--Ici dans le h3 (titre) on devra limiter le text !!!-->
  			  <h3>Actualite Actualite Actualite</h1>
  			  <p>Posté le 19 Aout 2019</p>

          <!--Ici dans le p on devra limiter le text !!!-->
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
             eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
             ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
           </p>
  			  <a href="#">Voir les infomations...</a>
  			</div>
		  </div>

		  <div class="actualiteZ2">  </div>

		  <img class="actualiteZ1" src="../../prototype/testEve/img1.jpg" alt="imageDeFonds" >

    </section>

    <section class="actualite">

		  <div class="actualiteZ3">
  			<div class="txt">
          <!--Ici dans le h3 (titre) on devra limiter le text !!!-->
  			  <h3>Actualite Actualite Actualite</h1>
  			  <p>Posté le 19 Aout 2019</p>

          <!--Ici dans le p on devra limiter le text !!!-->
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
             eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
             ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
           </p>
  			  <a href="#">Voir les infomations...</a>
  			</div>
		  </div>

		  <div class="actualiteZ2">  </div>

		  <img class="actualiteZ1" src="../../prototype/testEve/img1.jpg" alt="imageDeFonds" >

    </section>

    <!-- Bouton de scrolling animé via CSS (NE PAS TOUCHER) -->
    <div class="box">
      <a href="#menu">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <!--FIN DE LA SECTION DU BOUTON DE SCROLLING-->

      </div>
    </section>


    <br><br><br><br><br>

    <script>
    function myMove() {
      var elem = document.getElementById("myAnimation");
      var pos = 0;
      var id = setInterval(frame, 10);
      function frame() {
        if (pos == 180) {
          clearInterval(id);
        } else {
          pos++;
          elem.style.top = pos + 'px';

        }
      }
    }
    </script>
    <?php include "Design/Footer.view.php"; ?>
  </body>

</html>
