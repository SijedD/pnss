<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Добавления новых помещений</h2></div>
    <div class="roomForm">
        <form method="post">
            <label><input type="text" name="room_name_number" placeholder="Имя" class="inputRoom"></label><br>

                <label><input type="text" name="room_type" placeholder="Вид помещения" class="inputRoom" > </label>


                <br>
            <select name="id_divisions" class="inputRoom">
                <?php
                foreach ($divisions as $divison) {
                    echo "<option>$divison->id</option>";
                }
                ?>
            </select><br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
