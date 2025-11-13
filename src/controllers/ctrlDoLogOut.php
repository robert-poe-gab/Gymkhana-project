<?php

function ctrlDoLogOut($request, $response, $container)
{
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}
