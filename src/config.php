<?php

/** 
 * Fitxer de configuració de l'aplicació.
 * */ 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$config = [];


$config["db"] = array();
$config["db"]["user"] = 'admin';
$config["db"]["password"] = 'password';
$config["db"]["dbname"] = 'odsp2';
$config["db"]["host"] = 'p2_mysql';
$config["db"]["port"] = '3306';