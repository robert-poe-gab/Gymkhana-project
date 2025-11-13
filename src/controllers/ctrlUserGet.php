<?php

function ctrlUserGet($request, $response, $container) {
    
    $id=$request->get(INPUT_GET, "id");
    $userModel = $container->Users();
    $users = $userModel->getByUser($id);
    $response->set("users", $users);
    $response->setTemplate("adminUser.php");

    /*$userModel = $container->Users();
    $users = $userModel->getUsers();
    

    $response->set("users", $users);
    $response->setTemplate("adminUser.php");*/

    return $response;    
}