<?php

namespace Models;


class ODS {

     private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

   
public function update($id, $text){
    // Si por error llega como array, lo convertimos en string
    if (is_array($text)) {
        $text = implode("\n", $text);
    }

    $stm = $this->db->prepare('UPDATE ods SET text = :text WHERE id_ods = :id_ods;');
    $result = false;
    try {
        $result = $stm->execute([
            ':id_ods' => $id,
            ':text' => $text,
        ]);
    } catch (\PDOException $e) {
        error_log("Error en ODS->update: " . $e->getMessage());
    }
    return $result;
}



    public function getById($id) {
        $query = "select id_ods, title, description, text from ods where id_ods = :id_ods;";
        $stm = $this->db->prepare($query);
        $stm->execute([
            ':id_ods' => $id,
        ]);
        $link = $stm->fetch(\PDO::FETCH_ASSOC);

        return $link;
    }

    public function getODS() {
        $query = "SELECT * FROM ods ORDER BY id_ods ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

