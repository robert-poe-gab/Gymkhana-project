<?php

use Models\Users;

function ctrlUserUpdate($request, $response, $container)
{
    $db = $container->db();
    $usersModel = new Users($db);

    $id = $request->get(INPUT_POST, "id");
    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $isAdmin = $request->get(INPUT_POST, "isAdmin");

    $data = [
        "name" => $name,
        "last_name" => $last_name,
        "isAdmin" => $isAdmin
    ];

    $usersModel->updateAdministrateUser($id, $data);
    $response->set("updated", true);

    $response->redirect("Location: index.php?r=adminUser");
    return $response;

}
