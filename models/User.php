<?php
require("database.php");

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    /**
     * This function return all users in array
     * @return array
     */
    function getAll(): array
    {
        $sql = "SELECT * FROM users ORDER BY name";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();

        return $users;
    }

    /**
     * This function return current id of item
     * @return int
     */
    function getId(): int
    {
        if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = clear_xss($_GET['id']);
        } else {
            $_SESSION["error"] = "URL invalide";
            header("location: index.php");
        }
        return $id;
    }
    /**
     * This function return a single users
     * @return array
     */
    function get(): array
    {
        $id = $this->getId();
        $sql = "SELECT * FROM users WHERE id=:id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $users = $query->fetch();

        if (!$users) {
            $_SESSION["error"] = "Ce jeu n'est pas disponible.";
            header("location: index.php");
        }

        return $users;
    }

    /**
     *  This function delete a users(item)
     * @return void
     */
    function delete(): void
    {
        $id = $this->getId();
        $sql = "DELETE FROM users WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        //redirect
        $_SESSION["success"] = "Le jeu es bien supprimer.";
        header("location:index.php");
    }

    /**
     *  This function create item(game)
     * @return void
     */
    function create($name, $email, $password): void
    {
        $sql = "INSERT INTO users(name, email, password, created_at) VALUES(:name, :email, :password, NOW())";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();
        // redirect
        $_SESSION["success"] = "le user a bien été ajouté";
        header("Location: index.php");
        die;
    }

    /**
     * This function update a item(user)
     * @return void
     */
    function update($name, $email, $password): void
    {
        $id = $this->getId();
        $sql = "UPDATE users SET name = :name, email = :email, password = :password, updated_at = NOW() WHERE id= :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $_SESSION["success"] = "le user a bien été modifié";
        header("Location: index.php");
        die;
    }
}
