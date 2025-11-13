<?php

namespace Models;


class Gymkhana {

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

    // getGymkhanas
    public function get($id){
        $query = "select * from gimcana where id_gimcana = :id;";
        $stm = $this->db->prepare($query);
        $stm->execute([
            ':id' => $id,
        ]);
        $dadesGymkhana = $stm->fetch(\PDO::FETCH_ASSOC);

        return $dadesGymkhana;
    }

    public function getAll(){
        $query = "select * from gimcana;";
        $stm = $this->db->prepare($query);
        $stm->execute();
        $dadesGymkhana = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $dadesGymkhana;
    }

    public function searchGymkhanas($title) {
        $query = "SELECT id_gimcana, title, description, start_date, end_date 
                FROM gimcana 
                WHERE title LIKE :title 
                ORDER BY id_gimcana DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute([":title" => "%$title%"]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}

