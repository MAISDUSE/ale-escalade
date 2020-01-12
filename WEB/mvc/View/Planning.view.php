<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Site web de l'Ale-Escalade</title>
    <link rel="stylesheet" href="../View/Design/HeaderFooter.css">
    <link rel="stylesheet" href="../View/Design/Planning.css">
  </head>
  <body>
    <?php include "Design/Header.view.php"; ?>

    <div class="conteneur_agenda">

      <p>
        L'agenda ci-dessous représente les cours ainsi que les événements organisés par l'ALE Escalade. <br>
        <br>
        Si vous voulez naviguer entre les deux agendas sans avoir les deux au même endroit, vous pouvez sélectioner l'agenda que vous voulez observer entre Cours et Événements grâce à la petite flèche en heut à droite, à côté de l'onglet "Planning". <br>
        <br>
        Notez aussi que l'agenda Événements <b>n'affiche pas</b> les événements des adhérents car ceux-si sont sous la responsabilité des adhérents y participant uniquement. (Événements liés au forum). <br>
        <br>
      </p>

      <div class="agenda"> <!-- Agenda des cours et des événements créés par l'ALE -->
        <iframe src="https://calendar.google.com/calendar/embed?height=700&amp;wkst=2&amp;bgcolor=%23EF6C00&amp;ctz=Europe%2FParis&amp;src=b3QzdHZtMmZqMmZrNGYzNDZ1anEzN2E1bmtAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;src=aW9lZ284czlmczdqY2c1ZTg1YnZ1bWI2M2dAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%239F3501&amp;color=%23DD5511&amp;showTz=0&amp;mode=WEEK" style="border-width:0" width="100%" height="700" frameborder="0" scrolling="no"></iframe>
      </div>

    </div>

    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
