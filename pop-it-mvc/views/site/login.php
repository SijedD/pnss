<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Авторизация</h2></div>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="formLogin">
    <form method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label><input type="text" name="login" placeholder="Логин" class="inputLogin"></label><br>
        <label><input type="password" name="password" placeholder="Пароль " class="inputPassword"></label><br>
        <button class="butLogin">Войти</button>
    </form></div></div>
<?php endif;
