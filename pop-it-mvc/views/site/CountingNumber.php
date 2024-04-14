<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Подсчет количества абонентов по подразделениям и помещениям.</h2>
    </div>
    <div class="searchAbonentForm">
        <!-- Форма для подсчета абонентов по подразделениям -->
        <form method="get" action="<?= app()->route->geturl('/CountingNumber') ?>">
            <label>
                <h2>Выберите подразделение</h2>
                <select name="Id_divisions" class="inputReg">
                    <?php foreach ($divisions as $division): ?>
                        <option value="<?= $division->id ?>"><?= $division->name ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br>
            <br>
            <button class="butReg">Посчитать</button>
        </form>
        <div>
            Выбранное подразделение содержит <?= $countAbonents ?> абонентов.
        </div>
    </div>
    <div class="searchAbonentForm">
        <!-- Форма для подсчета абонентов по подразделениям -->
        <form method="get" action="<?= app()->route->geturl('/CountingNumber') ?>">
            <label>
                <h2>Выберите комнату </h2>
                <select name="id_rooms" class="inputReg">
                    <?php foreach ($rooms as $division): ?>
                        <option value="<?= $division->id ?>"><?= $division->room_name_number ?></option>
                    <?php endforeach; ?>
                </select>
            </label><br>
            <br>
            <button class="butReg">Посчитать</button>
        </form>
        <div>
            Выбранная комната содержит <?= $countAbonentsroom ?> абонента(ов).
        </div>
    </div>

    <!-- Вывод количества абонентов по подразделениям -->


    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад</a><br>
</div>