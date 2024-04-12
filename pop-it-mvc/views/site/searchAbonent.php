<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск номеров абонента по подразделениям.</h2></div>
    <div class="searchAbonentForm">
        <form method="get" action="searchAbonent.php">
            <select name="id_subscribers" class="inputReg">
                <?php

                use Model\Phone_number;

                foreach ($divisions as $Phone_number) {
                    echo "<option label='$Phone_number->surname $Phone_number->name $Phone_number->patronymic'>$Phone_number->id</option>";
                }
                ?>
            </select>
            <select name="id_phone" class="inputReg">
                <?php

                use Model\Division;

                foreach ($abonent as $Division) {
                    echo "<option label='$Division->name'>$Division->id</option>";
                }
                ?>
            </select><br>

            <br>

            <button class="butReg">Поиск</button>
        </form></div>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
