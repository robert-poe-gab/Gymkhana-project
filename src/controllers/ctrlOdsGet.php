<?php

function ctrlOdsGet($request, $response, $container){

    $id=$request->get(INPUT_GET, "id_ods");
    $odsModel = $container->ODS();
    $ods = $odsModel->getById($id);
    $response->set("ods", $ods);
    $response->setTemplate("OdsIndex.php");


    return $response;    
}