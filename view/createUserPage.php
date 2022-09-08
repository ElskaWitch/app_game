<?php
$title = "Ajouter un user";
ob_start();
require("partials/_createUser.php");

$content = ob_get_clean();
require("layout.php");
