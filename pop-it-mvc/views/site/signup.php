<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Регистрация нового пользователя</h2></div>
<div class="regForm">
    <form method="post">
    <label><input type="text" name="name" placeholder="Имя" class="inputReg"></label><br>
    <label><input type="text" name="surname" placeholder="Фамилия" class="inputReg"></label><br>
    <label><input type="text" name="patronymic" placeholder="Отчество" class="inputReg"></label><br>
    <label><input type="text" name="date" placeholder="Дата рождения" class="inputReg"></label><br>
    <label><input type="text" name="login" placeholder="Логин" class="inputReg"></label><br>
    <label><input type="password" name="password" placeholder="Пароль" class="inputReg"></label><br>
    <button class="butReg">Добавить</button>
</form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
