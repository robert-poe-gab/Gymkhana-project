<?php

function ctrlSearch($request, $response, $container)
{
    $gymkhanaModel = $container->Gymkhana();

    $gymkhanas = $gymkhanaModel->getAll();
    
    $response->set('gymkhanas',$gymkhanas );

    $response->setTemplate("search.php");

    return $response;
}