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

    public static function is_login()
    {
        if (isset($_SESSION['email'])) {
            return true;
        }
        return false;
    }
}