<?php

/**
 * This file show a single game
 */
// session_start();
require_once("models/database.php");
$game = getGame();
$title = $game['name'];
require("view/showPage.php");
