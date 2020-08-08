<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if (isset($errors)) {
        foreach ($errors as $error):
            echo $error . "<br>";
        endforeach;
    } ?>
    <form action="#" method="POST">
        <input type="text" name="lname" placeholder="Фамилия">
        <input type="text" name="fname" placeholder="Имя">
        <input type="text" name="mname" placeholder="Отчество">
        <input type="text" name="email" placeholder="E-mail">
        <input type="password" name="password">
        <input type="submit" name="submit" value="Регистрация">
    </form>
</body>
</html>
