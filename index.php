<!-- header -->
<?php
$title = "Accueil"; //title for current page
include('partials/_header.php');
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
                <!-- row 1 -->
                <tr>
                    <th>1</th>
                    <td>Zelda</td>
                    <td>Aventure</td>
                    <td>Switch</td>
                    <td>45.99</td>
                    <td>7</td>
                    <td><img src="img/voir.png" alt="loupe" class="w-5"></td>

                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- end main content -->

<!-- footer -->
<?php include('partials/_footer.php') ?>