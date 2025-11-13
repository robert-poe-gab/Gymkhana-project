<?php

function ctrlOdsIndex($request, $response, $container){

    $odsModel = $container->ods();

    $ods = $odsModel->getODS();

    $response->set("ods", $ods);
    
    $response->setTemplate("OdsIndex.php");

    return $response;    
}