<?php

function ctrlValidateComm($request, $response, $container)
{
    $user = $response->getSession("user");

    if (!$user || $user["isAdmin"] != 1) {
        $response->redirect("Location: index.php?r=login&error=forbidden");
        return $response;
    }

    $idComment = $request->get(INPUT_POST, "id_comment");

    $commsModel = $container->Comms();

    $ok = $commsModel->publishComm($idComment);

    if ($ok) {
        $response->redirect("Location: index.php?r=adminComms&success=1");
    } else {
        $response->redirect("Location: index.php?r=adminComms&error=db");
    }

    return $response;
}
