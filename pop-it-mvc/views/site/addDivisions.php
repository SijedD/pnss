
<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Добавить новое подразделение</h2></div>
    <h3><?= $message ?? ''; ?></h3>
    <div class="regForm">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label><input type="text" name="name" placeholder="Название" class="inputReg"></label><br>
            <label><input type="text" name="type_division" placeholder="Тип подразделения" class="inputReg"></label><br>
            <br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
