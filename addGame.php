<?php
session_start();
/**
 * This file show form for create a new item(game)
 */
require_once('controllers/Game.php');

$controller = new \Controllers\Game();
$controller->create();
