<?php

namespace Models;


class Users {

    private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

    public function getUsers(){
        $users = [];
        $query = "select * from user order by id desc;";
        foreach ($this->db->query($query, \PDO::FETCH_ASSOC) as $user) {
            $users[] = $user;
        }
        return $users;
    }

    public function getByUser($email) {
        $query = "select id, name, las_name, nickname, profile_image, email, password, isAdmin from user where email = :email;";
        $stm = $this->db->prepare($query);
        $stm->execute([
            ':email' => $email,
        ]);
        $dadesUser = $stm->fetch(\PDO::FETCH_ASSOC);

        return $dadesUser;
    }

    public function add($name, $lastName, $nickname, $email, $password, $isAdmin = 0): mixed{
        $stm = $this->db->prepare('insert into user ( `name`, `last_name`, `nickname`, `email`, `password`, `isAdmin`)
        values (:name, :last_name, :nickname, :email, :password, :isAdmin);');
        $result = false;
        try {
            $result = $stm->execute([
                ':name'   => $name,
                ':last_name'  => $lastName,
                ':nickname' => $nickname,
                ':email' => $email,
                ':password' => $password,
                ':isAdmin' => $isAdmin,
            ]);
        } catch (\PDOException $e) {
            print_r($e);
            die();
        }
        return $result;
    }

    public function updateUser($id, $data) {
        $sql = "UPDATE user SET 
                    name = :name,
                    last_name = :last_name,
                    nickname = :nickname,
                    email = :email" .
                    (!empty($data['profile_image']) ? ", profile_image = :profile_image" : "") .
                    (!empty($data['password']) ? ", password = :password" : "") .
                " WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $data["name"]);
        $stmt->bindValue(":last_name", $data["last_name"]);
        $stmt->bindValue(":nickname", $data["nickname"]);
        $stmt->bindValue(":email", $data["email"]);
        if (!empty($data["profile_image"])) $stmt->bindValue(":profile_image", $data["profile_image"]);
        if (!empty($data["password"])) $stmt->bindValue(":password", $data["password"]);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }
}

