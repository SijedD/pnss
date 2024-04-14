<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Регистрация нового пользователя</h2></div>
    <h3><?= $message ?? ''; ?></h3>
<div class="regForm">
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <label><input type="text" name="name" id="name" placeholder="Имя" class="inputReg"></label><br>
    <label><input type="text" name="surname" placeholder="Фамилия" class="inputReg"></label><br>
    <label><input type="text" name="patronymic" placeholder="Отчество" class="inputReg"></label><br>
    <label><input type="date" name="date" placeholder="Дата рождения" class="inputReg"></label><br>
    <label><input type="text" name="login" placeholder="Логин" class="inputReg"></label><br>
    <label><input type="password" name="password" placeholder="Пароль" class="inputReg"></label><br>


            <input type="file" name='image_path'><br>


    <button class="butReg">Добавить</button>
</form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
