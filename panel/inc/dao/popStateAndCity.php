<?php

require_once __DIR__."/../../../config/connection.php";

class popStateAndCity{
    function popState(){
        $connetion = new Connection();
        $sql = "SELECT id, name FROM states";

        $conn = $connetion->connectionLocal();
        $query = $conn->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function popCities($state_id){
        $connection = new Connection();
        $sql = "SELECT id, name, cep FROM cities WHERE state_id = :state_id";

        $conn = $connection->connectionLocal();
        $query = $conn->prepare($sql);
        $query->bindValue(":state_id", $state_id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function popCep($city_id){
        $connection = new Connection();
        $sql = "SELECT cep FROM cities WHERE id = :city_id";

        $conn = $connection->connectionLocal();
        $query = $conn->prepare($sql);
        $query->bindValue(":city_id", $city_id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }
}