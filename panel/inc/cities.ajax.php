<?php

require_once "../../config/connection.php";
require_once "dao/popStateAndCity.php";

ini_set( 'default_charset', 'utf-8');

$action = addslashes($_GET['action']);
$cities = new popStateAndCity();

switch($action){
    case 1:
        $state_id = addslashes($_GET['state']);
        $result = $cities->popCities($state_id);
    break;

    case 2:
        $city_id = addslashes($_GET["city"]);
        $result = $cities->popCep($city_id);
    break;
}

echo (json_encode($result));