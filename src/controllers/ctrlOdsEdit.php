<?php
function ctrlOdsEdit($request, $response, $container) {

    $odsModel = $container->ods();

    $id = $request->get(INPUT_GET, "id");
    $ods = $odsModel->getById($id);

    $response->set("ods", $ods);
    $response->set("id", $id);
    $response->setTemplate("OdsEdit.php");

    return $response;
}
