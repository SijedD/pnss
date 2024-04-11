<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Подсчет количества абонентов по подразделениям и помещениям.</h2></div>
    <div class="searchAbonentForm">
        <form method="post">
            <div class="dropdown">
                <label ><input type="text" name="pod" placeholder="Выбирете подразделение" class="inputRoom" > <a class="drop"> > </a> </label>

                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <div class="dropdown">

                <button class="butReg">Посчитать</button>
        </form></div>
    <div class="searchAbonentForm">
        <form method="post">
            <div class="dropdown">
                <label ><input type="text" name="pod" placeholder="Выбирете Помещение" class="inputRoom" > <a class="drop"> > </a> </label>

                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <div class="dropdown">

                <button class="butReg">Посчитать</button>
        </form></div>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
