<?php

function ctrlAddComm($request, $response, $container)
{
    $user = $response->getSession("user");

    if (!$user) {
        $response->redirect("Location: index.php?r=login");
        return $response;
    }

    $comms = $request->get(INPUT_POST, "comment");
    $valoration = $request->get(INPUT_POST, "valoration");
    $idGim = $request->get(INPUT_POST, "id_gimcana");

    if (empty($comms)) {
        $response->redirect("Location: index.php?r=viewGimcana&id=$idGim&error=empty");
        return $response;
    }

    $commsModel = $container->Comms();

    // Add comm on hidden till admin validates
    $ok = $commsModel->addComms($comms, $valoration, $user["id"], $idGim);

    // Redirigir según resultado
    if ($ok) {
        $response->redirect("Location: index.php?r=viewGimcana&id=$idGim&success=1");
    } else {
        $response->redirect("Location: index.php?r=viewGimcana&id=$idGim&error=db");
    }

    return $response;
}
