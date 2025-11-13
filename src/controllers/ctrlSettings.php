<?php

function ctrlSettings($request, $response, $container)
{
     
    $response->setTemplate("settings.php");

    return $response;
}