<?php
function ctrlDoSettings($request, $response, $container) {
    $userModel = $container->users();

    $id = $request->get(INPUT_GET, "id");
    if (empty($id)) die("ID del usuario no recibido.");

    $user = $userModel->getById($id);
    if (!$user) die("Usuario no encontrado.");

    $response->set("user", $user);
    $response->set("id", $id);
    $response->setTemplate("settings.php");

    return $response;
}
