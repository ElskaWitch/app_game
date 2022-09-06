<?php
session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name'];

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

if (!empty($_POST["submited"])) {
    if (empty($_FILES["url_img"]["name"])) {
        $url_img = $game["url_img"];
    }
    update($error);
}

require("view/updatePage.php");
