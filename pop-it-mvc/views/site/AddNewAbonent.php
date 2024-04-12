
<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2>Добавить нового абонента</h2></div>
    <div class="regForm">
        <form method="post">
            <label><input type="text" name="name" placeholder="Имя" class="inputReg"></label><br>
            <label><input type="text" name="surname" placeholder="Фамилия" class="inputReg"></label><br>
            <label><input type="text" name="patronymic" placeholder="Отчество" class="inputReg"></label><br>
            <label><input type="date" name="date_birth" placeholder="Дата рождения" class="inputReg"></label><br>

                <select name="Id_divisions" class="inputReg">
                    <?php
                        foreach ($divisions as $divison) {
                            echo "<option>$divison->id</option>";
                        }
                    ?>
                </select>
                <br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
