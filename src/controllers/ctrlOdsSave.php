<?php

function ctrlOdsSave($request, $response, $container)
{

    $id =  $request->get(INPUT_POST, "id");
    $content =  $request->getRaw(INPUT_POST, "contingut");
    $odsModel = $container->ODS();

    $ods = $odsModel->update($id, $content);
    $response->set("contingut", $ods);
    $response->setTemplate("index.php");
    $response->redirect("Location: index.php");
    return $response;
}