<?php


class CabinetController
{
    public function actionIndex() {
        if (!User::is_login()) {
            die("Вы не авторизованы.<br> <a href='user/login'>Авторизоваться</a>");
        }
    
        $array = User::getUserById();

        require_once(ROOT . '/views/cabinet/index.php');
        return true;
    }
}