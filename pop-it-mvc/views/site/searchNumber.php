<link rel="stylesheet" href="/pnss/pop-it-mvc/public/css/styles.css">
<div class="container">
    <div class="header">
        <h2> Поиск всех номеров абонента.</h2></div>
    <div class="searchNumberForm">
        <form method="post">
            <div class="dropdown">
                <label ><input type="text" name="name" placeholder="Имя" class="inputRoom" > <a class="drop"> > </a> </label>


                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <div class="dropdown">
                <label ><input type="text" name="surname" placeholder="Фамилия" class="inputRoom" > <a class="drop"> > </a> </label>


                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>
            <div class="dropdown">
                <label ><input type="text" name="patronymic" placeholder="Отчество" class="inputRoom" > <a class="drop"> > </a> </label>


                <div class="dropdown-content">
                    <p>dsa</p>
                </div></div><br>


            <button class="butReg">Поиск</button>
        </form></div>
    <a class="logout" href="<?= app()->route->getUrl('/') ?>"> Назад
    </a><br>
</div>
