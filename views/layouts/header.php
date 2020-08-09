<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clinics</title>
    <link rel="stylesheet" href="../../template/css/main.css">
    <link rel="stylesheet" href="../../template/css/normalize.css">
</head>
<header>
    <div class="logo">
        <img src="#" alt="LOGO" class="header-logo">
    </div>
    <div class="links header-links">
        <?php if (!User::is_login()) echo '
            <a href="user/login">Авторизация</a>
            <a href="user/register">Регистрация</a> ';
            else echo '
            <a href="cabinet">Личный кабинет</a>
            <a href="user/logout">Выйти</a>';
        ?>
    </div>
</header>