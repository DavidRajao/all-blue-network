<?php

$id = $_GET['id']; //recuperer l'id du personnage demandé

// Récupérer les données de l'API
$dataApi = json_decode(file_get_contents("data/characters.json"), true);
$perso = isset($dataApi[$id-1]) ? $dataApi[$id-1] : null;

//redirection si id incorrect
if (!isset($perso)) {
    header('Location: lstPersos.php');
    exit;
}

$descData = json_decode(file_get_contents("data/desc-characters.json"), true);
$desc = isset($descData[$id]) ? $descData[$id] : null;
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" href="img/abn-logo.png">
        <title><?=$perso['name']?> | All Blue Network</title>
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

        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/api/characters/<?= $id ?>.webp" alt="Image de <?= $perso['name']; ?>" class="img-fluid img-desc rounded">
                    <br><br>
                    <p><b>Âge :</b> <?= !empty($perso['age']) ? $perso['age'] : "inconnu"; ?></p>
                    <p><b>Statut :</b> <?= $perso['status']; ?></p>
                    <p><b>Prime :</b> <?= isset($perso['bounty']) ? $perso['bounty'] . " Berrys" : "Aucune"; ?></p>
                    <p><b>Fruit du démon :</b> <?= isset($perso['fruit']) ? "<a href='fruit.php?id=".$perso['fruit']['id']."'>".$perso['fruit']['name']."</a>" : "Aucun"; ?></p>
                </div>
                <div class="col-md-8">
                    <h1 style="padding:0;"><?=$perso['name']; ?></h1>
                    <h2>
                        <?= isset($perso['crew']) ? 
                        ("<img src='img/api/crews/".$perso['crew']['id']."-flag.webp' alt='Drapeau de ". $perso['crew']['name'] ."' class='flag-crew'> 
                        <a href='crew.php?id=".$perso['crew']['id']."'>" . $perso['crew']['name'] . "</a>")
                        : "Sans équipage" ?>
                    </h2>
                    <?= isset($desc) ? "<p class='desc'>".$desc."</p>" : "" ;?>
                </div>
            </div>
        </section>

        <!-- FOOTER du site -->
         <?php include ('footer.php') ; ?>

    </body>
</html>