<?php

function ctrlViewGymkhana($request, $response, $container)
{

    $gymkhanaModel = $container->Gymkhana();
    $questsModel = $container->Quests();
    
    $id = $request->get(INPUT_GET,"id");
    
    $gymkhana = $gymkhanaModel->get($id);

    if($gymkhana === false){
        $response->redirect("Location: index.php?r=ExplorateGymkhana&error=1");
        return $response;
    }

    $quests = $questsModel->getAllQuestsByGymkhanaId($id);
    $questsLocations = [];

    foreach ($quests as $quest) {
        $questsLocations[] = $quest['location'];
    }
    $questsLocationsJSON = htmlspecialchars(json_encode($questsLocations), ENT_QUOTES, 'UTF-8');

    $response->set("gymkhana",$gymkhana);
    
    $response->set("quests",$questsLocationsJSON);

    $response->setTemplate("view-gymkhana.php");

    return $response;

}