<?php
session_start();
/**
 * This file show the user page
 */
/**
 * Get all users from models and stock in array $users
 */
require_once("models/User.php");
$model = new User();
$users = $model->getAll("name");
require("view/userPage.php");
