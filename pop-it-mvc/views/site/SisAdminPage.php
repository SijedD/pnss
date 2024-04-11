
<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Главная страница системного администратора</h2></div>

    <a class="butSis" href="<?= app()->route->getUrl('/add') ?>"> Добавить нового абонента
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/addRoom') ?>">  Добавления новых помещений
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/addNumber') ?>">  Добавления новых телефонов
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/AttachAbonent') ?>"> Прикрепить абонента к номеру телефона.
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/searchAbonent') ?>"> Поиск номеров абонента по подразделениям.
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/searchNumber') ?>"> Поиск всех номеров абонента.
    </a><br>
    <a class="butSis" href="<?= app()->route->getUrl('/CountingNumber') ?>"> Подсчет количества абонентов по подразделениям и помещениям.
    </a><br>
    <a class="logout" href="<?= app()->route->getUrl('/logout') ?>">Выход </a>
