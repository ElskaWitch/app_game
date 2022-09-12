<?php
session_start();
/**
 * This file show the user page
 */
require_once('controllers/User.php');
$controller = new \Controllers\User();
$controller->index();
