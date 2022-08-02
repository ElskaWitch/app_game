<!-- header -->
<?php
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
debug_array($games)
?>

<!-- main content -->
<div class="pt-16 wrap_content">
    <!-- head content -->
    <div class="wrap_content-head text-center">
        <h1 class="text-blue-500 text-5xl  text-uppercase font-black">App Game</h1>
        <p class="pt-5">L'app qui repertorie vos jeux</p>
    </div>
    <div class="overflow-x-auto mt-16">
        <table class="table w-full">
            <!-- table-->
            <thead>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Genre</th>
                    <th>Plateform</th>
                    <th>prix</th>
                    <th>PEGI</th>
                    <th>Voir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Zelda</td>
                    <td>Aventure</td>
                    <td>Switch</td>
                    <td>45.99</td>
                    <td>7</td>
                    <td>
                        <a href="show.php">
                            <img src="img/oeil.png" alt="eye" class="w-4">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') ?>