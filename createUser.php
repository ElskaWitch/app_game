<?php
session_start();
/**
 * This file show form for create a new item(game)
 */
require_once('controllers/User.php');
$controller = new \Controllers\User();
$controller->create();
