<?php
session_start();
/**
 * This file show a single game
 */
require_once('controllers/Game.php');

$controller = new \Controllers\Game();
$controller->show();
