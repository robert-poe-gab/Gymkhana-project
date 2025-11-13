<?php

function ctrlOdsList($request, $response, $container){

    $odsModel = $container->ODS();

    $ods = $odsModel->getODS();

    $response->set("ods", $ods);
    $response->setTemplate("list.php");

    return $response;    
}