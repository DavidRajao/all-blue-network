<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Liste des quiz | All Blue Network</title>
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
  <body>

    <!-- header du site -->
    <?php include ('header.php') ; ?>
    
    <main>
      
      <!-- image de fond -->
      <div class="bg">
        <div class="blur-bg"></div>
      </div>

      <section class="content">
        <h1>QUIZ</h1>
        <h3>Testez vos connaissances sur l'univers de One Piece !</h3><br><br>
        <h3>Choisissez une catégorie :</h3><br>
        <ul class="liste-btn">
          <li><a href="quiz.php?cat='characters'" class="comic-button">Personnages</a></li>
          <li><a href="quiz.php?cat='crews'" class="comic-button">Équipages</a></li>
          <li><a href="quiz.php?cat='locates'" class="comic-button">Lieux</a></li>
        </ul>
      </section>

      <!-- FOOTER du site -->
      <?php include ('footer.php') ; ?>

    </main>
  </body>
</html>