<?php
// session_start();
/**
 * This file show a single user
 */
require_once("models/User.php");
$model = new \Models\User();
$user = $model->get();
$title = $user['name'];
require("view/showUserPage.php");
