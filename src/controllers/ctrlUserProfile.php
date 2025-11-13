<?php

function ctrlUserProfile($request, $response, $container)
{
    // $userModel = $container->Users();
    $userData = $request->get("SESSION", "user");

    $response->set("userData",$userData);

    $response->setTemplate("user-settings.php");

    return $response;

}