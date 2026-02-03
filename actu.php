<?php

$id = $_GET['id']; //recuperer l'id de l'actualité demandé

// Récupérer les données de l'API
$dataApi = json_decode(file_get_contents("data/actus.json"), true);
$actu = null;

//recherche de l'actu avec l'id demandé dans la liste des actus
foreach ($dataApi as $a) {
    if ($a['id'] == $id) {
        $actu = $a;
        break;
    }
}

//redirection si id incorrect
if (!isset($actu)) {
    header('Location: actus.php');
    exit;
}

//gestion affichage date
date_default_timezone_set('Europe/Paris');
$date = new DateTime($actu['date']);
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$jour = $formatter->format($date);

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" href="img/abn-logo.png">
        <title><?= $actu['titre'] ?> | All Blue Network</title>
        <meta name="author" content="David Rajaonarivelo" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Chau+Philomene+One:ital@0;1&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noticia+Text:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <script defer src="script.js"></script>
    </head>
    <body>

        <?php include ('header.php'); ?>

        <!-- image de fond floutée -->
        <div class="bg">
            <div class="blur-bg"></div>
        </div>

        <section class="content ctn-actu">
            <h1><?= $actu['titre'] ?></h1>
            <h3><?= $actu['sous_titre'] ?></h3>
            <img src="img/actus/<?=$id;?>.webp" alt="<?= $actu['altImg']; ?>" class="img-fluid rounded">
            <p class="alt-img"><?= $actu['altImg'] ?></p>
            <p class="texte"><?= $actu['content'] ?></p>
            <br>
            <p class="date">Publié le <?= $jour ?>.</p>
        </section>

        <!-- FOOTER du site -->
        <?php include ('footer.php') ; ?>

    </body>
</html>