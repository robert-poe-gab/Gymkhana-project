<?php

function ctrlViewGymkhana($request, $response, $container)
{

    $gymkhanaModel = $container->Gymkhana();
    
    $id = $request->get(INPUT_GET,"id");

    $gymkhana = $gymkhanaModel->get($id);

    if($gymkhana === false){
        $response->redirect("Location: index.php?r=ExplorateGymkhana&error=1");
    }

    $response->set("gymkhana",$gymkhana);

    $response->setTemplate("view-gymkhana.php");

    return $response;

}