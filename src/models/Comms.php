<?php

namespace Models;

class Comms {
    
    private $db;

    public function __construct($db){
        $this->db = $db->getDb();
    }

    public function addComms($comms, $valoration, $idUser, $idGim) {
        $stm = $this->db->prepare('
            INSERT INTO comment 
            (comment, published_date, is_published, valoration, id_user, id_gimcana, created_at)
            VALUES (:comms, :publishedDate, :isPublished, :valoration, :idUser, :idGim, :createdAt);
        ');

        $now = date('Y-m-d H:i:s');
        $isPublished = 0;

        try {
            $stm->execute([
                ':comms' => $comms,
                ':publishedDate' => $now,
                ':isPublished' => $isPublished,
                ':valoration' => $valoration,
                ':idUser' => $idUser,
                ':idGim' => $idGim,
                ':createdAt' => $now
            ]);
            return true;
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // For admin to validate
    public function publishComm($idComment) {
        $stm = $this->db->prepare('UPDATE comment SET is_published = 1 WHERE id_comment = :id');
        return $stm->execute([':id' => $idComment]);
    }

    // Obtener comentarios publicados de una gimcana
    public function getPublishedCommsByGimcana($idGim) {
        $stm = $this->db->prepare('
            SELECT c.*, u.name 
            FROM comment c 
            INNER JOIN user u ON c.id_user = u.id
            WHERE c.id_gimcana = :idGim AND c.is_published = 1
            ORDER BY c.published_date DESC;
        ');
        $stm->execute([':idGim' => $idGim]);
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
}
