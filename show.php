<!-- header -->
<?php
// start session
session_start();
$title = "Show"; //title for current page
include('partials/_header.php');
include("helpers/functions.php");
// include PDO pour la connexion BDD
require_once("helpers/pdo.php");
// debug_array($_GET)

//1-verifie id existant et que c'est un int
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    // 2- je nettoie mon id contre xss
    $id = clear_xss($_GET['id']);
    // 3- requette (query in english) vers BDD
    $sql = "SELECT * FROM jeux WHERE id=:id";
    // 4- préparation de la requette
    $query = $pdo->prepare($sql);
    // 5- securiser la requette contre injection sql
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    // 6- executer la requette vers la BDD
    $query->execute();
    // 7- on stock tout ds une variable
    $game = $query->fetch();
    // debug_array($game);
    // $game = [];

    if (!$game) {
        $_SESSION["error"] = "Ce jeu n'est pas disponible.";
        header("location: index.php");
    }
} else {
    $_SESSION["error"] = "URL invalide";
    header("location: index.php");
}
?>

<div class="text-center ">
    <h1 class="text-blue-500 text-5xl  text-uppercase font-black pb-10 pt-16 "><?= $game["name"] ?></h1>
    <p class="pb-5"><?= $game["description"] ?></p>
    <div class="">
        <p>Genre : <?= $game["genre"] ?></p>
        <p>Plateforms : <?= $game["plateforms"] ?></p>
        <p>Note : <?= $game["note"] ?>/10</p>
        <p>PEGI : <?= $game["PEGI"] ?></p>
        <p>Prix : <?= $game["price"] ?>€</p>
    </div>
    <div class="pt-10">
        <a href="delete.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-error text-white">Supprimer le jeu</a>
    </div>
</div>

<!-- footer -->
<?php include('partials/_footer.php') ?>