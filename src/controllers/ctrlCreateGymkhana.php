<?php

function ctrlCreateGymkhana($request, $response, $container)
{

    $gymkhanaModel = $container->Gymkhana();
    //get form inputs
    $title = trim($request->get(INPUT_POST, "title"));
    $date = $request->get(INPUT_POST, "datetime");
    if(!empty($date)){
        [$startDate, $endDate] = explode(" to ", $date);
    }
    else{
        [$startDate, $endDate] = "";
    }
    $description = $request->get(INPUT_POST, "description");
    $location = $request->get(INPUT_POST, "location");

    

    //check if location is valid
    $valid = false;
    if ($location) {
        $parts = explode(',', $location);
        if (count($parts) === 2) {

            $lat = trim($parts[0]);
            $lon = trim($parts[1]);

            if (is_numeric($lat) && is_numeric($lon)) {
                $lat = (float) $lat;
                $lon = (float) $lon;

                if ($lat >= -90 && $lat <= 90 && $lon >= -180 && $lon <= 180) {
                    $valid = true;
                }
            }
        }
    }
    //return with error if its not valid
    if (!$valid) {
        $response->redirect("Location: index.php?r=createGymkhana&error=1");
        return $response;
    }

    //save image
    $destination = "";
    if ($request->has("FILES", "imageGim")) {
        $fileName = basename($request->get("FILES", "imageGim")['name']);
        $destination = "./assets/images/gymkhana/" . $fileName;
        if (!file_exists($destination)) {
            move_uploaded_file($request->get("FILES", "imageGim")['tmp_name'], $destination);
        }
    }


    $gymkhanaModel->add($title, $description, $fileName, $startDate, $endDate, $location);

    $response->redirect("Location: index.php?r=createGymkhana");

    return $response;

}