<?php


class User
{
    public static function register($email, $password, $fname, $lname, $mname)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO users (email, password, fname, mname, lname) VALUES (:email, :password, :fname, :mname, :lname)";
        $result = $db -> prepare($sql);
        $result -> bindParam(':email', $email, PDO::PARAM_STR);
        $result -> bindParam(':password', $password, PDO::PARAM_STR);
        $result -> bindParam(':fname', $fname, PDO::PARAM_STR);
        $result -> bindParam(':lname', $lname, PDO::PARAM_STR);
        $result -> bindParam(':mname', $mname, PDO::PARAM_STR);
        
        return $result -> execute();
    }

    public static function login($email, $password)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE email = :email;";
        $result = $db -> prepare($sql);
        $result -> bindParam(':email', $email, PDO::PARAM_STR);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result -> execute();

        $array = $result -> fetch();

        $verify = password_verify($password, $array['password']);

        if ($verify) {
            return true;
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkUserData($email) {
        $db = Db::getConnection();

        $sql = "SELECT id FROM users WHERE email = :email;";
        $result = $db -> prepare($sql);
        $result -> bindParam(':email', $email, PDO::PARAM_STR);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result -> execute();

        $array = $result -> fetch();

        return $userId = $array['id'];
    }

    public static function is_login()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public static function getUserById() {
        $id = $_SESSION['user'];

        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE id = :id;";
        $result = $db -> prepare($sql);
        $result -> bindParam(':id', $id, PDO::PARAM_STR);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result -> execute();

        return $array = $result -> fetch();
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        // Соединение с БД        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkMName($name) {
        if (strlen($name) >= 4) {
            return true;
        }
        return false;
    }
}