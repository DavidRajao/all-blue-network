<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Descriptions | All Blue Network</title>
    <meta name="author" content="David Rajaonarivelo" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chau+Philomene+One:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="script.js"></script>
  </head>
  <body onload="ajusterFond()">

    <!-- header du site -->
    <?php include ('header.php') ; ?>

    <main>

      <!-- image de fond floutée -->
      <div class="bg">
        <div class="blur-bg">
        </div>
      </div>

      <section class="content" style="width:70%;">
        <h1>Descriptions</h1>
        <h3>Apprenez en plus sur le riche univers de <i>One Piece</i> !</h3>
        <br><br>
        <div class="fiches">
          <a href="lstPersos.php">
            <img class="img-lstcrew rounded" src="img/fiches/lstPersos.webp" alt="Image liste personnages">
            <div class="nom-lstcrew">Personnages</div>
          </a>
          <a href="lstEquipages.php">
            <img class="img-lstcrew rounded" src="img/fiches/lstEquipages.webp" alt="Image liste équipages">
            <div class="nom-lstcrew">Equipages</div>
          </a>
          <a href="lstLieux.php">
            <img class="img-lstcrew rounded" src="img/fiches/lstLieux.webp" alt="Image liste lieux">
            <div class="nom-lstcrew">Lieux</div>
          </a>
          <a href="lstFruits.php">
            <img class="img-lstcrew rounded" src="img/fiches/lstFruits.webp" alt="Image liste fruits">
            <div class="nom-lstcrew">Fruits du démon</div>
          </a>
        </div>
      </section>

    </main>

    <!-- FOOTER du site -->
    <?php include ('footer.php') ; ?>
    
  </body>
</html>