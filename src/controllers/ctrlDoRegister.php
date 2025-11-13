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
        $response->redirect("Location: /index.php?r=register&error=1");
        return $response;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response->redirect("Location: /index.php?r=register&error=2");
        return $response;
    }

    if ($password !== $repeatPassword) {
        $response->redirect("Location: /index.php?r=register&error=3");
        return $response;
    }

    if (strlen($password) < 8) {
        $response->redirect("Location: /index.php?r=register&error=4");
        return $response;
    }


    try {
        $userModel->add($name, $lastName, $nickname, $email, $password);
    } catch (PDOException $e) {
        $response->redirect("Location: /index.php?r=register&error=5");
        return $response;
    }

    $response->setSession("nickname", $nickname);

    $response->redirect("Location: /index.php?r=login&success=1");

    return $response;
}
