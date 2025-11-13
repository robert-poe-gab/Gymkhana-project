<?php

class ctrlAdmin {
    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] != 1) {
            header("Location: index.php?r=login");
            exit();
        }
    }
}

class ctrlAdminODS extends ctrlAdmin {
    public function __construct($db) {
        parent::__construct();
        $this->modelODS = new \Models\ODS($db);
    }

    public function showODSList() {
        $odsList = $this->modelODS->getODS();
        require_once 'src/views/admin/odsList.php';
    }

    public function editODS($id) {
        $ods = $this->modelODS->getById($id);
        require_once 'src/views/admin/editODS.php';
    }

    public function updateODS($id, $text) {
        $this->modelODS->update($id, $text);
        header("Location: index.php?r=admin/odsList");
        exit();
    }
}
