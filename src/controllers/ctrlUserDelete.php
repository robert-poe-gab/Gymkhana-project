<?php

use Models\Users;

function ctrlUserDelete($request, $response, $container) {
    $db = $container->db();
    $usersModel = new Users($db);

    $id = $request->get(INPUT_POST, "id"); 

    if ($id) {
        $usersModel->deleteUser($id);
        $response->set("deleted", true);
    } else {
        $response->set("deleted", false);
    }

    $response->redirect("Location: index.php?r=adminUser");
    return $response;

}
