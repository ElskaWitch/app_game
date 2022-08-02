<!-- header -->
<?php
// demarrer session
session_start();
$title = "Accueil"; //title for current page
include('partials/_header.php');
include("helpers/functions.php");
// include PDO pour la connexion BDD
require_once("helpers/pdo.php");
//1- recuperer les jeux
$sql = "SELECT * FROM jeux";
// 2- prépare la requette (préformatter)
$query = $pdo->prepare($sql);
// 3- execute la requette
$query->execute();
// 4- on stock le resultat ds une variable
$games = $query->fetchAll();
// debug_array($games)
?>

<!-- main content -->
<div class="pt-16 wrap_content">
    <!-- head content -->
    <div class="wrap_content-head text-center">
        <h1 class="text-blue-500 text-5xl  text-uppercase font-black">App Game</h1>
        <p class="pt-5">L'app qui repertorie vos jeux</p>

        <?php
        // je verifie que session error et vide ou pas
        if ($_SESSION["error"]) { ?>
            <div class="bg-red-400 text-white">
                <?= $_SESSION["error"] ?>
            </div>
        <?php }
        // je vide ma variable $_SESSION["error] pour qu'il n'affiche pas de message
        $_SESSION["error"] = [];
        ?>

    </div>
    <div class="overflow-x-auto mt-16">
        <table class="table w-full">
            <!-- table-->
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Plateform</th>
                    <th>prix</th>
                    <th>PEGI</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($games) == 0) {
                    echo " <tr><td class='text-center'> Pas de jeux disponible actuellement</td> </tr>";
                } else { ?>
                    <?php foreach ($games as $game) : ?>
                        <tr>
                            <th><?= $game['id'] ?></th>
                            <td><?= $game['name'] ?></td>
                            <td><?= $game['genre'] ?></td>
                            <td><?= $game['plateforms'] ?></td>
                            <td><?= $game['price'] ?></td>
                            <td><?= $game['PEGI'] ?></td>
                            <td>
                                <a href="show.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                                    <img src="img/oeil.png" alt="eye" class="w-4">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') ?>