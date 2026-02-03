<!DOCTYPE html>
<html lang="fr">
  <head>
    <link rel="icon" href="img/abn-logo.png">
    <title>Lieux | All Blue Network</title>
    <meta name="author" content="David Rajaonarivelo" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chau+Philomene+One:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
  </head>
  <body onload="genererLieux(), checkPopup()">
    <!-- header du site -->
    <?php include ('header.php') ; ?>

    <main>

      <!-- Fond noir popup -->
      <div class="popup-bg" id="popupBg"></div>

      <!-- Affichage popup d'alerte spoil -->
      <div class="popup" id="popup">
        <h2>⚠️ Attention Spoilers !</h2>

        <p>
            Cette page contient des informations qui peuvent révéler des informations importantes sur l'histoire de One Piece. <br>
            Si vous n'êtes pas à jour avec l'anime, vous risquez de découvrir des <b>spoilers majeurs</b>.
        </p>

        <div class="popup-checkbox">
            <input type="checkbox" id="dontShowAgain">
            <label for="dontShowAgain">Ne plus afficher cet avertissement</label>
        </div>

        <div class="popup-buttons">
            <button class="popup-btn popup-btn-2" onclick="retour()">
                Retour
            </button>
            <button class="popup-btn popup-btn-1" onclick="closePopup(true)">
                J'ai compris
            </button>
        </div>
      </div>

      <!-- image de fond floutée -->
      <div class="bg bg-lstlieux">
        <div class="blur-bg">
        </div>
      </div>

      <section class="content lst-desc">
        <h1>Lieux</h1>
        <input type="search" id="search" placeholder="Recherche">
        <br><br>
        <div class="ctn-card" >
          <!-- contient les lieux généré par script -->
        </div>
      </section>

    </main>

    <!-- FOOTER du site -->
    <?php include ('footer.php') ; ?>

  </body>
</html>