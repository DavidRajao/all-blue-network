<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Regarder les films | All Blue Network</title>
    <meta charset="utf-8">
    <meta name="author" content="David Rajaonarivelo" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chau+Philomene+One:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script defer src="script.js"></script>
  </head>
  <body onload="genererGuide(2), genererFilms()">

    <!-- header du site -->
    <?php include ('header.php') ; ?>
    
    <main>

        <!-- Fond noir popup -->
      <div class="popup-bg" id="popupBg" onclick="closePopup(false)"></div>

      <!-- Affichage popup d'alerte spoil -->
      <div class="popup popup-films" id="popup">
        <h2 style="color: black;">Liste des films</h2>
          <table class="table">
            <thead>
              <tr class="align-middle">
                <th>N°</th>
                <th>Affiche</th>
                <th>Nom</th>
                <th>Date de sortie française</th>
              </tr>
            </thead>
            <tbody id="tableau-films">
            </tbody>
          </table>
      </div>
      
      <!-- image de fond -->
      <div class="bg">
        <div class="blur-bg"></div>
      </div>

      <section class="content">
        <h1>Regarder les films</h1>
        <h2><span id="afficher-films" onclick="showPopup()">Afficher la liste des films One Piece</span></h2>
        <h3>Voici une liste des plateformes pour regarder les films One Piece :</h3>
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