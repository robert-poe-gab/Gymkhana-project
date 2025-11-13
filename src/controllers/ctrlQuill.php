<?php

function ctrlQuill($request, $response, $container)
{
     
    $response->setTemplate("editQuill.php");

    return $response;
}