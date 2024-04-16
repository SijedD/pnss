<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h3><?= $message ?? ''; ?></h3>
        <h2> Прикрепить абонента к номеру телефона.</h2></div>
    <div class="AttachAbonentForm">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <select name="id_subscribers" class="inputReg">
                <?php

                use Model\Phone_number;

                foreach ($divisions as $Phone_number) {
                    echo "<option label='$Phone_number->surname $Phone_number->name $Phone_number->patronymic'>$Phone_number->id</option>";
                }
                ?>
            </select><br>
            <br>
            <label class="inputReg">Выберете номер телефона</label><br>

            <select name="id_phone" class="inputReg">
                <?php

                use Model\Phone;

                foreach ($phone as $Phone) {
                    echo "<option label='$Phone->phone_number'>$Phone->id</option>";
                }
                ?>
            </select><br>

            <button class="butReg">Добавить</button>
        </form></div>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
