<?php

use Models\ODS;
class Container extends \Emeset\Container {

    private $db;

    public function __construct($config)
    {
        parent::__construct($config);
        $this->db = $this->Db();
    }

    public function ods(){
        return new \Models\ODS($this->db);
    }
    public function Users(){
        return new \Models\Users($this->db);
    }
    public function Gymkhana(){
        return new \Models\Gymkhana($this->db);
    }
    public function Quests(){
        return new \Models\Quests($this->db);
    }
    public function Db(){
        return new \Models\Db(
            $this->config["db"]["user"], 
            $this->config["db"]["password"],
            $this->config["db"]["dbname"],
            $this->config["db"]["host"],
            $this->config["db"]["port"]
        );
    }
    
}