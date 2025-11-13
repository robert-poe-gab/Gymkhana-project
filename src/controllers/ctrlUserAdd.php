<?php
use Models\Users;

function ctrlUserAdd($request, $response, $container) {
    $db = $container->db();
    $usersModel = new Users($db);

    $name = $request->get(INPUT_POST, "name");
    $last_name = $request->get(INPUT_POST, "last_name");
    $nickname = $request->get(INPUT_POST, "nickname");
    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");
    $isAdmin = $request->get(INPUT_POST, "isAdmin") ?? 0;

    $usersModel->add($name, $last_name, $nickname, $email, $password, $isAdmin);

    $response->setTemplate("adminUser.php");
    $response->set("users", $usersModel->getUsers());
    $response->set("created", true);

    return $response;
}
