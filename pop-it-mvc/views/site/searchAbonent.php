<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск номеров абонента по подразделениям.</h2></div>
    <div class="searchAbonentForm">
        <form name="search" method="post" action="<?= app()->route->geturl('/searchAbonent') ?>">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <select name="subscriberId" class="inputReg">
                <?php

                use Model\Subscriber;

                foreach ($subscribers as $Phone_number) {
                    echo "<option label='$Phone_number->surname $Phone_number->name $Phone_number->patronymic'>$Phone_number->id</option>";
                }
                ?>
            </select>
            <br><br>
            <label class="inputReg">Выберете подразделение</label><br>
            <select name="divisionsId" class="inputReg">
                <?php

                use Model\Division;

                foreach ($divisions as $Phone_number) {
                    echo "<option label='$Phone_number->name'>$Phone_number->id</option>";
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
                    номер: <?=$abonent->phone_number?><br>

                    <!-- Другие данные абонента, которые вам нужны -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>