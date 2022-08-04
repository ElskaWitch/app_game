<!-- header -->
<?php
// start session
session_start();
$title = "Add Game"; //title for current page
include('partials/_header.php');
include("helpers/functions.php");
// include PDO pour la connexion BDD
require_once("helpers/pdo.php");
// debug_array($_GET)

// traitement du formulaire
//////////////////////////
// creation array error
$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
// variable success
$success = false;

// 1-je verifie si le formulaire est soumis
if (!empty($_POST["submited"])) {
    //2-je fais les failles xss
    $name = clear_xss($_POST["name"]);
    $price = clear_xss($_POST["price"]);
    $note = clear_xss($_POST["note"]);
    $description = clear_xss($_POST["description"]);

    $genres = $_POST["genre"];
    $genre_clear = [];
    foreach ($genres as $genre) {
        $genre_clear[] = clear_xss($genre);
    };

    $plateforms = $_POST["plateforms"];
    $plateforms_clear = [];
    foreach ($plateforms as $plateform) {
        $plateforms_clear[] = clear_xss($plateform);
    };

    $PEGI = clear_xss($_POST["PEGI"]);

    //3-validation de chaque input
    // name
    if (!empty($name)) {
        if (strlen($name) <= 2) {
            $error["name"] = "<span class=text-red-500>*3 Caractères minimum</span>";
        } elseif (strlen($name) > 100) {
            $error["name"] = "<span class=text-red-500>*100 Caractères maximum</span>";
        }
    } else {
        $error["name"] = $errorMessage;
    }

    // // prix
    if (!empty($price)) {
        if (!is_numeric($price)  && !is_float($price)) {
            $error["price"] = "<span class=text-red-500>*veuillez entrez un prix</span>";
        } elseif ($price < 0) {
            $error["price"] = "<span class=text-red-500>*veuillez rentrer un prix supérieur à 0€</span>";
        } elseif ($price > 90) {
            $error["price"] = "<span class=text-red-500>*veuillez rentrer un prix inférieur à 90€</span>";
        }
    } else {
        $error["price"] = $errorMessage;
    }

    // // note
    if (!empty($note)) {
        if (!is_numeric($note) > 1) {
            $error["note"] = "<span class=text-red-500>*il faut mettre une note de 1 à 10</span>";
        } elseif ($note > 10) {
            $error["note"] = "<span class=text-red-500>*il faut mettre une note sur 10</span>";
        }
    } else {
        $error["note"] = $errorMessage;
    }

    // // description
    if (!empty($description)) {
        if (strlen($description) <= 25) {
            $error["description"] = "<span class=text-red-500>*25 Caractères minimum</span>";
        } elseif (strlen($description) > 500) {
            $error["description"] = "<span class=text-red-500>*500 Caractères maximum</span>";
        }
    } else {
        $error["description"] = $errorMessage;
    }

    // // genre
    if (!empty($genre)) {
    } else {
        $error["genre"] = $errorMessage;
    }

    // // plateform
    if (!empty($plateforms)) {
    } else {
        $error["plateforms"] = $errorMessage;
    }

    // // PEGI
    if (!empty($PEGI)) {
        $error["PEGI"] = $errorMessage;
    }


    // //4- if no error
    if (count($error) == 0) {
        $success = true;
        // inscription BDD
    }
}

?>

<section class="py-16 ">
    <h1 class="text-blue-500 text-5xl  text-uppercase font-black pb-10 pt-16 text-center ">Ajouter un jeu</h1>
    <form action="" method="POST" class="grid place-items-center bg-gray-100 mx-96 py-10 my-16 gap-y-4 rounded-xl">
        <!--input name  -->
        <div class="mb-4">
            <label for="name" class="font-semibold text-blue-500">name</label>
            <input type="text" name="name" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                        if (!empty($_POST["name"])) {
                                                                                                            echo $_POST["name"];
                                                                                                        } ?>" />
            <p>
                <?php
                if (!empty($error["name"])) {
                    echo $error["name"];
                }
                ?>
            </p>
        </div>
        <!--input price  -->
        <div class="mb-4">
            <label for="price" class="font-semibold text-blue-500">Prix</label>
            <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                                    if (!empty($_POST["price"])) {
                                                                                                                        echo $_POST["price"];
                                                                                                                    } ?>" />
            <p>
                <?php
                if (!empty($error["price"])) {
                    echo $error["price"];
                }
                ?>
            </p>
        </div>
        <!--input note  -->
        <div class="mb-4">
            <label for="note" class="font-semibold text-blue-500">Note</label>
            <input type="number" step="0.01" name="note" class="input input-bordered w-full max-w-xs block" value="<?php
                                                                                                                    if (!empty($_POST["note"])) {
                                                                                                                        echo $_POST["note"];
                                                                                                                    } ?>" />
            <p>
                <?php
                if (!empty($error["note"])) {
                    echo $error["note"];
                }
                ?>
            </p>
        </div>
        <!--input description  -->
        <div class="mb-4 ">
            <label for="description" class="font-semibold text-blue-500">Description</label>
            <textarea name="description" class="textarea textarea-bordered block" value="<?php
                                                                                            if (!empty($_POST["description"])) {
                                                                                                echo $_POST["description"];
                                                                                            } ?>"></textarea>
            <p>
                <?php
                if (!empty($error["description"])) {
                    echo $error["description"];
                }
                ?>
            </p>
        </div>
        <!-- checkbox genre -->
        <?php
        $genreArray = [
            ["name" => "Aventure"],
            ["name" => "Fantasy"],
            ["name" => "RPG"],
            ["name" => "FPS"],
        ]
        ?>
        <h2 class="font-semibold text-blue-500 ">Genre</h2>
        <div class="mb-4 flex space-x-6">
            <?php foreach ($genreArray as $genre) : ?>
                <div class="flex item-center space-x-3">
                    <label><?= $genre["name"] ?></label>
                    <input type="checkbox" class="checkbox checkbox-primary bg-white" checked="" name="genre[]" value="<?= $genre["name"] ?>" />
                </div>
            <?php endforeach ?>
        </div>
        <!-- checkbox Plateform -->
        <?php
        $plateformArray = [
            ["name" => "Switch"],
            ["name" => "Ps3"],
            ["name" => "Ps4"],
            ["name" => "Xbox"],
        ]
        ?>
        <h2 class="font-semibold text-blue-500 ">Plateform</h2>
        <div class="mb-4 flex space-x-6">
            <?php foreach ($plateformArray as $plateform) : ?>
                <div class="flex item-center space-x-3">
                    <label><?= $plateform["name"] ?></label>
                    <input type="checkbox" class="checkbox checkbox-primary bg-white" checked="" name="plateforms[]" value="<?= $plateform["name"] ?>" />
                </div>
            <?php endforeach ?>
        </div>
        <!-- select PEGI -->
        <?php
        $pegiArray = [
            ["name" => 3],
            ["name" => 7],
            ["name" => 12],
            ["name" => 16],
            ["name" => 18],
        ]
        ?>
        <h2 class="font-semibold text-blue-500 ">PEGI</h2>
        <div class="mb-4">
            <select name="PEGI" class="select select-bordered w-full max-w-xs" value="">
                <option disabled selected>choisi un PEGI</option>
                <?php foreach ($pegiArray as $pegi) : ?>
                    <option value="<?= $pegi["name"] ?>"><?= $pegi["name"] ?></option>
                <?php endforeach ?>
            </select>

        </div>
        <!-- submit btn -->
        <div class="py-5">
            <input type="submit" name="submited" value="Ajouter" class="btn btn-active btn-primary">
        </div>
    </form>
</section>

<!-- footer -->
<?php include('partials/_footer.php') ?>