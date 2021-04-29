<head xmlns="http://www.w3.org/1999/html">
    <title>authorisation</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="index.js"></script>
</head>
<body class="light">

<link rel="stylesheet" href="index.css">
<main>
    <div id="top">
        <button id="authbtn">Регистрация</button>
        <button id="enterbtn">Вход</button>
        <button id="exit" style="display: none">Выход</button>
        <button id="theme">Смена темы</button>

    </div>

    <form name="auth" id="auth" method="post" action="#" class="section">
        <input type="text" name="name" placeholder="Имя" autocomplete="off" required pattern="[a-zA-Z]+">
        <input type="text" name="surname" placeholder="Фамилия" autocomplete="off" required pattern="[a-zA-Z]+">
        <input type="text" name="email" placeholder="Email" autocomplete="off" required pattern="\S+@[a-z]+.[a-z]+">
        <input type="text" name="login" placeholder="Логин" autocomplete="off" required pattern="[a-zA-Z0-9]+">
        <p id="addLogP" style="display: none"></p>
        <input type="password" name="password" placeholder="Пароль" autocomplete="off" required
               pattern="[a-zA-Z0-9!~@#$]+">
        <input type="password" name="pass2" placeholder="Подтверждение пароля" autocomplete="off" required>
        <select name="age" id="age" required>
            <option value="true">Мне больше 18</option>
            <option value="false">Мне меньше 18</option>
        </select>
        <p><input type="radio" value="men" name="sex" checked>Мужской</p>
        <p><input type="radio" value="women" name="sex">Женский</p>
        <input type="submit" name="submit" id="submit" value="Зарегестрироваться">

    </form>
    <form action="#" id="enter" method="post" style="display: none" class="section">
        <input type="text" name="login" placeholder="Логин" autocomplete="off" required>
        <p id="enterLogP" style="display: none">Неверный пароль</p>
        <input type="password" name="password" placeholder="Пароль" autocomplete="off" required>
        <p id="enterPassP" style="display: none">Неверный пароль</p>
        <input type="submit" id="entersub" value="Войти">
    </form>
    <form id="in" class="section" style="display: none">
        <h3>Добро пожаловать</h3>
        <h4 id="inp"></h4>
    </form>
    <div id="bottom" class="section">
        <div id="users">
            <h3>Пользователи</h3>
        </div>
        <div>
            <div id="stat">
                <h3>Статиска</h3>
                <p></p>
            </div>
            <div id="find">
                <h3>Поиск</h3>
                <form action="#" id="findForm">
                    <input type="text" name="request">
                    <input type="submit" value="Найти пользователя">
                </form>
                <div id="answer"></div>
            </div>
        </div>
    </div>
</main>
</body>




