<?php
$name = clear_xss($_POST["name"]);
$price = clear_xss($_POST["price"]);
$note = clear_xss($_POST["note"]);
$description = clear_xss($_POST["description"]);


$genres = !empty($_POST["genre"]) ? $_POST["genre"] : [];
$genre_clear = [];
foreach ($genres as $genre) {
    $genre_clear[] = clear_xss($genre);
};

$plateforms = !empty($_POST["plateforms"]) ? $_POST["plateforms"] : [];
$plateforms_clear = [];
foreach ($plateforms as $plateform) {
    $plateforms_clear[] = clear_xss($plateform);
};

$PEGI = !empty($_POST["PEGI"]) ? clear_xss($_POST["PEGI"]) : [];
if (!empty($img_upload_path)) {
    $url_img = $img_upload_path;
} else {
    $error["url_img"] = "<span class=text-red-500>*Choisissez un fichier<span>";
}
