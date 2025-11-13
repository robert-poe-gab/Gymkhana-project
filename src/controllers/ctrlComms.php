<?php

function ctrlComms($request, $response, $container)
{
     
    $response->setTemplate("comms.php");

    return $response;
}