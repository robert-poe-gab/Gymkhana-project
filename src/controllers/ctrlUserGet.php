<?php

function ctrlUserGet($request, $response, $container) {
    
    $userModel = $container->Users();
    $users = $userModel->getUsers();
    $response->set("users", $users);
    $response->setTemplate("adminUser.php");

    return $response;    
}