<?php

function ctrlAdminUser($request, $response, $container)
{
    $response->setTemplate("adminUser.php");

    return $response;
}