<?php

function ctrlExplorateGymkhana($request, $response, $container)
{
     
    $response->setTemplate("explorate-gymkhana.php");

    return $response;
}