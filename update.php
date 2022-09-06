<?php
session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name'];

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";

if (!empty($_POST["submited"])) {
    update($error);
}

require("view/updatePage.php");
