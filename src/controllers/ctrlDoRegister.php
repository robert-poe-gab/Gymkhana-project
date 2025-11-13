<?php

function ctrlDoRegister($request, $response, $container)
{
    $userModel = $container->Users();

    // Obtener y limpiar datos del POST
    $nickname = trim($request->get(INPUT_POST, "nickname"));
    $name = trim($request->get(INPUT_POST, "name"));
    $lastName = trim($request->get(INPUT_POST, "lastName"));
    $email = trim($request->get(INPUT_POST, "email"));
    $password = trim($request->get(INPUT_POST, "password"));
    $repeatPassword = trim($request->get(INPUT_POST, "repeatPassword"));


    if (empty($nickname) || empty($name) || empty($lastName) || empty($email) || empty($password)) {
        return $response->redirect("Location: /index.php?r=ctrlRegister&error=1");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $response->redirect("Location: /index.php?r=ctrlRegister&error=2");
    }

    if ($password !== $repeatPassword) {
        return $response->redirect("Location: /index.php?r=ctrlRegister&error=3");
    }

    if (strlen($password) < 8) {
        return $response->redirect("Location: /index.php?r=ctrlRegister&error=4");
    }

    $userModel->add($name, $lastName, $nickname, $email, $password);

    $response->setSession("nickname", $nickname);

    return $response->redirect("Location: /index.php?r=ctrlRegister");
}
