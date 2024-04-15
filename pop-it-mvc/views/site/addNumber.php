<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Добавления новых телефонов</h2></div>
    <h3><?= $message ?? ''; ?></h3>
    <div class="roomForm">
        <form method="post">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label><input type="text" name="phone_number" placeholder="Номер телефона" class="inputRoom"></label><br>
            <br>
            <label class="inputReg">Выберете комнату</label><br>
            <select name="id_rooms" class="inputRoom">
                <?php
                foreach ($divisions as $Room) {
                    echo "<option label='$Room->room_name_number'>$Room->id</option>";
                }
                ?>
            </select><br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
