<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск всех номеров абонента.</h2></div>
    <div class="searchNumberForm">
        <form name="search" method="get" action="<?= app()->route->geturl('/searchNumber') ?>">
            <select name="name" class="inputReg">
                <?php

                use Model\Subscriber;

                foreach ($subscribers as $subscriber) {
                    echo "<option label='$subscriber->name'>$subscriber->name</option>";
                }
                ?>
            </select><br>
            <select name="surname" class="inputReg">
                <?php

                foreach ($subscribers as $subscriber) {
                    echo "<option label='$subscriber->surname'>$subscriber->surname</option>";
                }
                ?>
            </select><br>
            <select name="patronymic" class="inputReg">
                <?php

                foreach ($subscribers as $subscriber) {
                    echo "<option label='$subscriber->patronymic'>$subscriber->patronymic</option>";
                }
                ?>
            </select><br>



            <button class="butReg">Поиск</button>
        </form></div>
    <!-- Вывод результатов поиска -->
    <?php if (!empty($findAbonent)): ?>
        <h3>Результаты поиска:</h3>
        <ul>
            <?php foreach ($findAbonent as $abonent): ?>
                <li>
                    <?php
                    foreach ($abonent->phoneNumber as $number)
                        echo "<p>номер:" . $number['phone']['phone_number'] . "</p>";
                    ?>

                    <!-- Другие данные абонента, которые вам нужны -->
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
