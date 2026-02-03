<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Bienvenue sur All Blue Network</title>
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

      <!-- image de fond floutée -->
      <div class="bg">
        <div class="blur-bg">
        </div>
      </div>

      <section class="content" id="ctn-index"> <!-- contenu de la page -->

        <div>
          <h1>Bienvenue sur <b>All Blue Network</b></h1>
          <p>
            Amateurs de Grand Line, passionnés du Nouveau Monde ou simples curieux, vous venez de jeter l’ancre au bon endroit !<br>
            <b>All Blue Network</b>, c’est le repaire des fans de <em style="color:#00a89a">One Piece</em>.<br><br>
            🔹 <a href="actus.php">Actualités</a> sur tout ce qui concerne <em>One Piece</em> et ses différentes adaptations,<br>
            🔹 <a href="fiches.php">Descriptions </a> sur vos <a href="lstPersos.php">personnages</a>, <a href="lstEquipages.php">équipages</a> préférés,<br>
            🔹 <a href="lstQuiz.php">Quiz</a> pour tester vos connaissances sur l'univers de Grand Line,<br>
            🔹 <a href="guides.php">Plateformes</a> répertoriées pour visionner en anime ou manga One Piece<br>
            <br>
            Embarquons ensemble à la conquête d’All Blue !<br>
          </p>
        </div>

        <br>

        <h2>Sections du site</h2>
        <div class="sections-site">
          <div class="ctn-card"> 
            <a href="actus.php">
              <img class="img-lstcrew rounded" src="img/index/actus.webp" alt="Image actualité">
              <div class="nom-lstcrew">Actualités</div>
              <h3>Les dernières actualités concernant One Piece</h3>
            </a>
            <a href="fiches.php">
              <img class="img-lstcrew rounded" src="img/index/desc.webp" alt="Image descriptions">
              <div class="nom-lstcrew">Descriptions</div>
              <h3>Apprenez en plus sur l'univers de One Piece</h3>
            </a>
          </div>
          <div class="ctn-card"> 
            <a href="lstQuiz.php">
              <img class="img-lstcrew rounded" src="img/index/quiz.webp" alt="Image quiz">
              <div class="nom-lstcrew">Quiz</div>
              <h3>Testez vos connaissances !</h3>
            </a>
            <a href="guides.php">
              <img class="img-lstcrew rounded" src="img/index/guides.webp" alt="Image descriptions">
              <div class="nom-lstcrew">Suivre One Piece</div>
              <h3>Vous voulez savoir où visionner One Piece en anime ou manga ?</h3>
            </a>
          </div>
        </div>
        <br>
        
      </section>
    </main>

    <!-- FOOTER du site -->
    <?php include ('footer.php') ; ?>

  </body>
</html>