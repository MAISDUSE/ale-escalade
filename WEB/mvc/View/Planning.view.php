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

    <div class="agenda"> <!-- Agenda des cours -->
      <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23EF6C00&amp;ctz=Europe%2FParis&amp;src=b3QzdHZtMmZqMmZrNGYzNDZ1anEzN2E1bmtAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%239F3501&amp;showTz=0&amp;showCalendars=0&amp;mode=WEEK" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>

    <div class="agenda"> <!-- Agenda des événements organisés par l'ALE -->
      <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;bgcolor=%23EF6C00&amp;ctz=Europe%2FParis&amp;showTz=0&amp;showCalendars=0&amp;mode=WEEK&amp;src=aW9lZ284czlmczdqY2c1ZTg1YnZ1bWI2M2dAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23DD5511" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    </div>

    <?php include "Design/Footer.view.php"; ?>
  </body>
</html>
