<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск номеров абонента по подразделениям.</h2></div>
    <div class="searchAbonentForm">
        <form name="search" method="get" action="<?= app()->route->geturl('/searchAbonent') ?>">
            <select name="id" class="inputReg">
                <?php

                use Model\Subscriber;

                foreach ($subscribers as $Phone_number) {
                    echo "<option label='$Phone_number->surname $Phone_number->name $Phone_number->patronymic'>$Phone_number->id</option>";
                }
                ?>
            </select>


            <br>

            <button class="butReg">Поиск</button>
        </form></div>
    <!-- Вывод результатов поиска -->
    <?php if (!empty($findAbonent)): ?>
        <h3>Результаты поиска:</h3>
        <ul>
            <?php foreach ($findAbonent as $abonent): ?>
                <li>
                    номер: <?=$abonent->rooms?><br>

                    <!-- Другие данные абонента, которые вам нужны -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>