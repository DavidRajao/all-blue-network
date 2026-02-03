<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Regarder le live action | All Blue Network</title>
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
        <h1>Regarder le live action</h1>
        <h3>Le live action One Piece est disponible en exclusivité sur Netflix.</h3>
        <br>
        <div class="plateforme">
          <a href="https://www.netflix.com/fr/title/80217863" target="_blank" style="color: inherit;">
            <div class="row">
                <div class="col-md-10 info">
                    <h2>
                      <img src="img/logos/netflix.webp" alt="Logo de Netflix">
                      Netflix
                    </h2>
                    <p>7,99€/mois en HD avec pubs<br>10,99€/mois en HD sans pubs<br>21,99€/mois en 4K+HDR sans pubs<br>Disponible dans toutes les langues.</p>
                </div>
                <div class="col-md-2 prix">
                    <h2 style="margin:0px;">7.99€</h2>par mois
                </div>
            </div>
          </a>
        </div>
      </section>

      <!-- FOOTER du site -->
      <?php include ('footer.php') ; ?>

    </main>
  </body>
</html>