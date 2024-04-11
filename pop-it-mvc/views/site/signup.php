<h2>Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Имя <input type="text" name="name"></label><br>
    <label>Фамилия <input type="text" name="surname"></label><br>
    <label>Отчество <input type="text" name="patronymic"></label><br>
    <label>Дата рождения <input type="text" name="date"></label><br>
    <label>Логин <input type="text" name="login"></label><br>
    <label>Пароль <input type="password" name="password"></label><br>
    <button>Зарегистрироваться</button>
</form>
