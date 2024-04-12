<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Добавления новых телефонов</h2></div>
    <div class="roomForm">
        <form method="post">
            <label><input type="text" name="phone_number" placeholder="Номер телефона" class="inputRoom"></label><br>
            <select name="id_premises" class="inputRoom">
                <?php
                foreach ($divisions as $Room) {
                    echo "<option label='$Room->room_name_number'>$Room->id</option>";
                }
                ?>
            </select><br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
