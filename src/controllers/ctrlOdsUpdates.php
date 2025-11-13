<?php
function ctrlOdsUpdate($request, $response, $container) {
    $odsModel = $container->ods();

    $id = $request->get(INPUT_POST, "id");
    $text = $request->get(INPUT_POST, "text");

    $odsModel->update($id, $text);

    header("Location: index.php?r=ODS");
    return $response;
}
