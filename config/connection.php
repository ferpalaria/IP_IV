<?php

class Connection{
    // Database of the system
    const HOST = "jefersonrc.com.br";
    const DATABASE = "revol760_faj_integracaoprofissional4";
    const USERNAME = "revol760_fajip43";
    const PASSWORD = "g$.kT8SPzS(eNmb*yo";

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