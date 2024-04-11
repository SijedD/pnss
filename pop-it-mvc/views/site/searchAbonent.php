<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск номеров абонента по подразделениям.</h2></div>
    <div class="searchAbonentForm">
        <form method="post">
            <div class="dropdown">
                <label ><input type="text" name="pod" placeholder="Выбирете подразделение" class="inputRoom" > <a class="drop"> > </a> </label>

                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <div class="dropdown">

            <button class="butReg">Поиск</button>
        </form></div>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
