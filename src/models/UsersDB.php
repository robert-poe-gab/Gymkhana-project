<?php

namespace Models;

class UsersDB {

    private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

    public function getById($id) {
        $query = "SELECT id, name, last_name, nickname, email, profile_image FROM user WHERE id = :id;";
        $stm = $this->db->prepare($query);
        $stm->execute([':id' => $id]);
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $last_name, $nickname, $email, $profile_image = null, $passwordHash = null) {
        $sql = "UPDATE user 
                SET name = :name, last_name = :last_name, nickname = :nickname, email = :email";
        
        if (!empty($profile_image)) $sql .= ", profile_image = :profile_image";
        if (!empty($passwordHash)) $sql .= ", password = :password";
        
        $sql .= " WHERE id = :id";

        $stm = $this->db->prepare($sql);
        $stm->bindValue(":id", $id);
        $stm->bindValue(":name", $name);
        $stm->bindValue(":last_name", $last_name);
        $stm->bindValue(":nickname", $nickname);
        $stm->bindValue(":email", $email);
        if (!empty($profile_image)) $stm->bindValue(":profile_image", $profile_image);
        if (!empty($passwordHash)) $stm->bindValue(":password", $passwordHash);
        $stm->execute();
    }
}
