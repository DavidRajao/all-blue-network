<?php

$id = $_GET['id']; //recuperer l'id du fruit demandé


// Récupérer les données de l'API
$dataApi = json_decode(file_get_contents("data/fruits.json"), true);
$fruit = isset($dataApi[$id-1]) ? $dataApi[$id-1] : null;

//redirection si id incorrect
if (!isset($fruit)) {
    header('Location: lstFruits.php');
    exit;
}

$persos = json_decode(file_get_contents('data/characters.json'), true);

//recherche du personnage qui possede le fruit
$detenteur = ($id==35) ? $persos[246] : null; //exception fruit id 35 => barbe noire (id 246)
foreach ($persos as $perso) {
    if (isset($perso['fruit']['id']) && $perso['fruit']['id'] == $id && $perso['status']!="Décédé")
        $detenteur = $perso;
}

$img = !empty($fruit['filename']) ? $fruit['filename'] : "img/api/fruits/" . $id . ".webp" ; //image disponible en ligne ou localement
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" href="img/abn-logo.png">
        <title><?= $fruit['name'] ?> | All Blue Network</title>
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
                    <img src="<?= $img ?>" alt="Image de <?= $fruit['name']; ?>" class="img-fluid img-desc rounded">
                </div>
                <div class="col-md-8">
                    <h1 style="padding:0;"><?= $fruit['roman_name']; ?></h1>
                    <h2><?= $fruit['name']; ?></h2>
                    <h3><b>Détenteur</b> : <?= isset($detenteur) ? "<a href='perso.php?id=" . $detenteur['id'] . "'>" .$detenteur['name'] . "</a>" : "Aucun" ?></h3>
                    <h3><b>Type</b> : <?= $fruit['type'] ?></h3>
                </div>
            </div>
            <br>
            <p class="desc"><?= $fruit['description'] ? $fruit['description'] : "" ?></p>
        </section>

        <!-- FOOTER du site -->
        <?php include ('footer.php') ; ?>

    </body>
</html>