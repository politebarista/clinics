<?php


class DoctorController
{
    public function actionLogin() {
        $email = null;
        $password = null;

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $result = Doctor::login($email, $password);
            if ($result) {
                $doctorId = User::checkUserData($email);

                Doctor::auth($doctorId);

                header('Location: /doctor/index');
            }
        }

        require_once(ROOT . '/views/doctor/login.php');
        return true;
    }

    public function actionIndex() {
        if (!Doctor::is_login()) {
            die("Вы не авторизованы.<br> <a href='login'>Авторизоваться</a>");
        }

        $array = Doctor::getDoctorById();

        require_once(ROOT . '/views/doctor/index.php');
        return true;
    }
}