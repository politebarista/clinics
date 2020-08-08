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

    public static function login()
    {

    }

    public static function is_login()
    {
        if (isset($_SESSION['email'])) {
            return true;
        }
        return false;
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