<?php
session_start();
/**
 * This file show form for create a new item(game)
 */
$title = "Add User";
require_once("models/User.php");

$error = [];
$errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";


if (!empty($_POST["submited"])) {
    require_once("utils/secure-form/include.php");
    if (count($error) == 0) {
        $model = new User;
        $model->create($name, $email, $password);
    }
}

require("view/createUserPage.php");
