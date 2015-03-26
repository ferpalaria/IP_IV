<?php

class Connection{
    // Database of the system
    const HOST = "host";
    const DATABASE = "db";
    const USERNAME = "user";
    const PASSWORD = "pass";

    public function connectionLocal(){

        $dsn = "mysql:host=".$this::HOST.";dbname=".$this::DATABASE;

        try{
            $db = new PDO($dsn,$this::USERNAME,$this::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES 'utf8'");
            $db->exec("SET character_set_connection=utf8");
            $db->exec("SET character_set_client=utf8");
            $db->exec("SET character_set_results=utf8");
        }catch (PDOException $e){
            echo htmlentities("Erro de conexão com o banco de dados:". $e->getMessage());
        }

        return $db;
    }
}