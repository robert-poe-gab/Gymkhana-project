<?php

function login($request, $response, $container, $next){

    $user = $request->get("SESSION", "user");
    if(is_null($user)){
        $response->redirect("Location: index.php?r=login");
        return $response;
    }

    $response = $next($request, $response, $container);
    $response->set("user", $user);

    return $response;
}