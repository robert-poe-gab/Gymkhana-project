<?php

function ctrlDoLogin($request, $response, $container)
{

    $email = $request->get(INPUT_POST, "email");
    $password = $request->get(INPUT_POST, "password");

    $userModel = $container->Users();

    $existeixUser = $userModel->getByUser($email);

    $response->setSession("user", null);

    if (!$existeixUser) {
        header("Location: index.php?r=login&error=1");
        exit;
    }
    if ($existeixUser["password"] !== $password) {
        header("Location: index.php?r=login&error=2");
        exit;
    }

    $response->setSession("user", $existeixUser);
    $response->setSession("isAdmin", $existeixUser['isAdmin']);

    header("Location: index.php");
    exit;
}
