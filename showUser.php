<?php
session_start();
require_once('controllers/User.php');
$controller = new \Controllers\User();
$controller->show();
