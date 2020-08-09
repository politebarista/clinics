<?php


class Doctor
{
    public static function login($email, $password)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE email = :email;";
        $result = $db -> prepare($sql);
        $result -> bindParam(':email', $email, PDO::PARAM_STR);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result -> execute();

        $array = $result -> fetch();
        
        if ($array['is_doctor']==1) {
            $verify = password_verify($password, $array['password']);

            if ($verify) {
                return true;
            }
            return false;
            die("Вы не доктор.");
        }
        
    }

    public static function auth($userId)
    {
        $_SESSION['doctor'] = $userId;
    }

    public static function is_login()
    {
        if (isset($_SESSION['doctor'])) {
            return true;
        }
        return false;
    }

    public static function getDoctorById() {
        $id = $_SESSION['doctor'];

        $db = Db::getConnection();

        $sql = "SELECT * FROM users WHERE id = :id;";
        $result = $db -> prepare($sql);
        $result -> bindParam(':id', $id, PDO::PARAM_STR);
        $result -> setFetchMode(PDO::FETCH_ASSOC);
        $result -> execute();

        return $array = $result -> fetch();
    }
}