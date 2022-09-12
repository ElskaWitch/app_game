<?php

namespace Controllers;

require_once("models/User.php");

class User
{
    private $model;

    public function __construct()
    {
        $this->model = new \Models\User();
    }

    public function index()
    {
        $users = $this->model->getAll("name");
        require("view/userPage.php");
    }

    public function show()
    {
        $user = $this->model->get();
        $title = $user['name'];
        require("view/showUserPage.php");
    }

    public function create()
    {
        $title = "Add User";
        $error = [];
        $errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
        if (!empty($_POST["submited"])) {
            require_once("utils/secure-form/include.php");
            if (count($error) == 0) {
                $this->model->create($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
            }
        }
        require("view/createUserPage.php");
    }

    public function update()
    {
        $game = $this->model->get();
        $title = $game['name'];
        $error = [];
        $errorMessage = "<span class=text-red-500>*Ce champs est obligatoire</span>";
        if (!empty($_POST["submited"])) {
            require_once("utils/secure-form/include.php");
            if (count($error) == 0) {
                $this->model->update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img);
            }
        }
        require("view/updateUserPage.php");
    }

    public function delete()
    {
        $this->model->delete();
    }
}
