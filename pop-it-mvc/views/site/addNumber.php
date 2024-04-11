<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Добавления новых телефонов</h2></div>
    <div class="roomForm">
        <form method="post">
            <label><input type="text" name="number" placeholder="Номер телефона" class="inputRoom"></label><br>
            <div class="dropdown">
                <label ><input type="text" name="room" placeholder="Помещение" class="inputRoom" > <a class="drop"> > </a> </label>


                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <button class="butReg">Добавить</button>
        </form></div><a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br></div>
