<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Regarder l'anime | All Blue Network</title>
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
  <body onload="genererGuide(0)">

    <!-- header du site -->
    <?php include ('header.php') ; ?>
    
    <main>
      
      <!-- image de fond -->
      <div class="bg">
        <div class="blur-bg"></div>
      </div>

      <section class="content">
        <h1>Regarder l'anime</h1>
        <h3>Voici une liste des plateformes pour regarder l'anime de One Piece :</h3>
        <br>
        <div class="ctn-guide">
          <!-- contenu généré par script -->
        </div>
      </section>

      <!-- FOOTER du site -->
      <?php include ('footer.php') ; ?>
    
    </main>
  </body>
</html>