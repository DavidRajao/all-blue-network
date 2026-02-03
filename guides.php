<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Suivre One Piece | All Blue Network</title>
    <meta name="author" content="David Rajaonarivelo" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chau+Philomene+One:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
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
        <h1>SUIVRE ONE PIECE</h1>
        <h3>Ici sont repertoriés les moyens (légaux) pour suivre <i>One Piece</i> en France.</h3><br><br><h2>Choisissez un média :</b></h2>
        <br>
        <div class="guides">
          <a href="guide-anime.php">
            <img class="img-lstcrew rounded" src="img/guides/anime.webp" alt="Image de l'anime One Piece">
            <div class="nom-lstcrew">Anime</div>
          </a>
          <a href="guide-manga.php">
            <img class="img-lstcrew rounded" src="img/guides/manga.webp" alt="Image du manga One Piece">
            <div class="nom-lstcrew">Manga</div>
          </a>
          <a href="guide-film.php">
            <img class="img-lstcrew rounded" src="img/guides/film.webp" alt="Image de l'affiche du film One Piece Red">
            <div class="nom-lstcrew">Films</div>
          </a>
          <a href="guide-la.php">
            <img class="img-lstcrew rounded" src="img/guides/live-action.webp" alt="Image du live-action One Piece">
            <div class="nom-lstcrew">Live action</div>
          </a>
        </div>
      </section>

    </main>

    <!-- FOOTER du site -->
    <?php include ('footer.php') ; ?>

  </body>
</html>