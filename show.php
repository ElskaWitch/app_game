<?php
// session_start();
/**
 * This file show a single game
 */
require_once("models/database.php");
$game = getGame();
$title = $game['name'];
require("view/showPage.php");
