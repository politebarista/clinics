<?php


class UserController
{
    public function actionRegister()
    {
        if(isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $mname = trim($_POST['mname']);

            $errors = false;

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 6 символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Некорректно введен email';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Данный e-mail уже зарегестрирован. Попробуйте другой.';
            }
            if (!User::checkName($fname)) {
                $errors[] = 'Имя не может быть короче двух символов.';
            }
            if (!User::checkName($lname)) {
                $errors[] = 'Фамилия не может быть короче двух символов.';
            }
            if (!User::checkMName($mname)) {
                $errors[] = 'Отчество не может быть короче четырех символов';
            }

           if ($errors == false) {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $result = User::register($email, $password, $fname, $lname, $mname);
                if ($result) {
                    User::afterAuth($email);
                }
           }
        }
        
        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    public function actionLogin() {
        $email = null;
        $password = null;

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
        }

        $result = User::login($email, $password);
        if ($result) {
            User::afterAuth($email);
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout() {

    }
}