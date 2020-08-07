<?php


class UserController
{
    public function actionRegister() // надо дополнить валидацией 
    {
        if(isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $mname = trim($_POST['mname']);

            $errors = false;

           if ($errors == false) {
                $result = User::register($email, $password, $fname, $lname, $mname);
                if ($result) {
                    $_SESSION['email'] = $email;
                    header("Location: /");
                }
           }
        }
        
        require_once(ROOT . '/views/user/register.php');
        return true;
    }
}