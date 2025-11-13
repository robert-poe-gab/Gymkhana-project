<?php
function ctrlSaveSettings($request, $response, $container) {
    $userModel = $container->users();

    $id = $request->get(INPUT_POST, "id");
    if (empty($id)) die("ID del usuario no recibido.");

    $name = trim($request->get(INPUT_POST, "name"));
    $last_name = trim($request->get(INPUT_POST, "last_name"));
    $nickname = trim($request->get(INPUT_POST, "nickname"));
    $email = trim($request->get(INPUT_POST, "email"));
    $password = trim($request->get(INPUT_POST, "password"));
    $repeatPassword = trim($request->get(INPUT_POST, "repeatPassword"));

    $profile_image = null;
    if ($request->has("FILES", "profile_image") && !empty($request->get("FILES", "profile_image")["name"])) {
        $file = $request->get("FILES", "profile_image");
        $destination = __DIR__ . "/../../public/uploads/" . basename($file["name"]);

        move_uploaded_file($file["tmp_name"], $destination);
        $profile_image = basename($file["name"]);
    }

    $passwordHash = null;
    if (!empty($password)) {
        if ($password !== $repeatPassword) {
            $response->redirect("Location: index.php?r=settings&id=$id&error=password_mismatch");
            return $response;
        }
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    $userModel->updateUser($id, [
        "name" => $name,
        "last_name" => $last_name,
        "nickname" => $nickname,
        "email" => $email,
        "profile_image" => $profile_image,
        "password" => $passwordHash
    ]);

    $response->redirect("Location: index.php?r=settings&id=$id");
    return $response;
}
