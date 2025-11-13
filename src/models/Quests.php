<?php

namespace Models;


class Quests {

    private $db;

    public function __construct($db)
    {
        $this->db = $db->getDb();
    }

    public function add($title, $description, $image, $startDate, $endDate, $location){
        $stm = $this->db->prepare('insert into gimcana ( `title`, `description`, `image`, `start_date`, `end_date`, `location`)
        values (:title, :description, :image, :start_date, :end_date, :location);');
        $result = false;
        try {
            $result = $stm->execute([
                ':title' => $title,
                ':description' => $description,
                ':image' => $image,
                ':start_date' => $startDate,
                ':end_date' => $endDate,
                ':location' => $location
            ]);
        } catch (\PDOException $e) {
            print_r($e);
            die();
        }
        return $result;
    }

    // getQuests
    public function getAllQuestsByGymkhanaId($id){
        $query = "select * from quest where id_gimcana = :id;";
        $stm = $this->db->prepare($query);
        $stm->execute([
            ':id' => $id,
        ]);
        $quests = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $quests;
    }
    public function get($id){
        $query = "select * from quest where id_gimcana = :id;";
        $stm = $this->db->prepare($query);
        $stm->execute([
            ':id' => $id,
        ]);
        $quests = $stm->fetchAll(\PDO::FETCH_ASSOC);
        return $quests;
    }
}