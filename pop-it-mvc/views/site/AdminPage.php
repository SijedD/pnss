<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Администратор</title>
    <link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
</head>
<body>
<div class="container">
    <div class="header">
<h2>Главная страница администратора</h2></div>

<a class="addSis1" href="<?= app()->route->getUrl('/signup') ?>"> Добавить системного администратора
</a><br>
    <button class="logout" onclick="location.href=''">Выход </button></div>
</body>
</html>