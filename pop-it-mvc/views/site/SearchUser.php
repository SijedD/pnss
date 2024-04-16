<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Добавить новое подразделение</h2></div>
<form method="POST">
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
    <input name="search_query" placeholder="Искать здесь..." type="search">
    <button type="submit" >Поиск</button>
</form>
    <?php foreach ($subscriber as $user): ?>
        <div class="notification">
            <h3><?='Пользователь: ', $user->surname,' ', $user->name, ' ' ,$user->patronymic ?></h3>
        </div>
    <?php endforeach; ?><br>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>