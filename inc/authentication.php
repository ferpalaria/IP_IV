<?php

require_once __DIR__."/../config/connection.php";

class Authentication{

    public function authenticationIndex($username, $password){
        $connection = new Connection();
        $sql = "SELECT id, name, lastname, username, password, createdin, active FROM users WHERE username = :username";
        $conn = $connection->connectionLocal();

        try{
            $query = $conn->prepare($sql);
            $query->bindValue(":username", $username);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "<script>alert(\"Não foi possivel consultar o banco de dados!\")</script>";
        }

        if ($result){
            if ($result->username == $username && $result->password == $password){
                if ($result->active == "yes") {
                    $sql = "SELECT * FROM users_permissions WHERE user_id = :id";

                    try{
                        $query = $conn->prepare($sql);
                        $query->bindValue(":id", $result->id);
                        $query->execute();
                        $result_permission = $query->fetchAll(PDO::FETCH_OBJ);
                    }catch (PDOException $e){
                        $result_permission = null;
                        echo "<script>alert(\"Não foi possivel carregar as permissões!\")</script>";
                    }

                    if ($result_permission){
                        $user = new stdClass();

                        $user->id = $result->id;
                        $user->name = $result->name;
                        $user->lastName = $result->lastname;
                        $user->username = $result->username;
                        $user->createdIn = $result->createdin;

                        $_SESSION["user"] = $user;
                        $_SESSION["user_permissions"] = $result_permission;

                        return "authenticated";
                    }else{
                        return "noPermission";
                    }
                }else{
                    return "userDisabled";
                }

            }else{
                return "userOrPasswordInvalid";
            }
        }else{
            return "userOrPasswordInvalid";
        }
    }

    public function changeLastLogin($id){
        $sql = "UPDATE users SET lastlogin = now() WHERE id = :id";

        $connection = new Connection();
        $conn = $connection->connectionLocal();

        try{
            $query = $conn->prepare($sql);
            $query->bindValue(":id", $id);
            $query->execute();
        }catch (PDOException $e){
            return false;
        }

        return true;
        exit();
    }

    public function checkLogin($module){
        $module = strtoupper($module);
        if (isset($_SESSION["user"])) {
            $sql = "SELECT id  FROM users WHERE id = :id AND name = :name AND lastname = :lastName AND username = :username AND createdin = :createdIn";
            $connection = new Connection();
            $conn = $connection->connectionLocal();

            $user = $_SESSION["user"];
            $user_permissions = $_SESSION["user_permissions"];

            try {
                $query = $conn->prepare($sql);
                $query->bindValue(":id", $user->id);
                $query->bindValue(":name", $user->name);
                $query->bindValue(":lastName", $user->lastName);
                $query->bindValue(":username", $user->username);
                $query->bindValue(":createdIn", $user->createdIn);
                $query->execute();
                $result = $query->fetch(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo "<script>alert(\"Erro ao verificar o login, contate o administrador!\")</script>";
            }

            if (!$result) {
                header("Location: ../auth?session=false");
                exit();
            } else {
                if ($module == "INDEX"){
                    return true;
                    exit();
                }else {
                    foreach ($user_permissions as $up) {
                        if ($up->module == $module || $up->module == "admin") {
                            return true;
                            exit();
                        }
                    }

                    $alert = new stdClass();
                    $alert->type = "error";
                    $alert->message = "Você não tem permissão para acessar este módulo!";

                    $_SESSION["alert"] = $alert;
                    header("Location: ../panel/");
                    exit();
                }
            }
        }else{
            header("Location: ../auth?session=false");
            exit();
        }
    }
}