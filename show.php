<?php
// session_start();
/**
 * This file show a single game
 */
require_once("models/Game.php");
$model = new Game();
$game = $model->getGame();
$title = $game['name'];
require("view/showPage.php");
