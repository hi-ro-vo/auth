<?php
?>

<head>
    <title>authorisation</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css">
</head>
<body class="light">


<main>
    <div id="top">
        <button id="exit">Вход</button>
    </div>

    <form name="auth" id="auth" method="post" action="#" >
        <input type="text" name="name" placeholder="Имя" autocomplete="off" required pattern="[a-zA-Z]+">
        <input type="text" name="surname" placeholder="Фамилия" autocomplete="off" required pattern="[a-zA-Z]+">
        <input type="text" name="email" placeholder="Email" autocomplete="off" required pattern="\S+@[a-z]+.[a-z]+">
        <input type="text" name="login" placeholder="Логин" autocomplete="off" required pattern="[a-zA-Z0-9]+">
        <input type="password" name="password" placeholder="Пароль" autocomplete="off" required pattern="[a-zA-Z0-9!~@#$]+">
        <input type="password" name="pass2" placeholder="Подтверждение пароля" autocomplete="off" required>
        <select name="age" id="age" required>
            <option value="true">Мне больше 18</option>
            <option value="false">Мне меньше 18</option>
        </select>
        <p><input type="radio" value="men" name="sex" checked>Мужской</p>
        <p><input type="radio" value="women" name="sex">Женский</p>
        <input type="submit" name="submit"  id="submit" value="Зарегестрироваться">

    </form>
    <form action="#" id="enter" method="post" style="display: none">
        <input type="text" name="login" placeholder="Логин" autocomplete="off" required>
        <input type="text" name="password" placeholder="Пароль" autocomplete="off" required>
        <input type="submit" id="entersbmt" value="Войти">
    </form>
</main>
</body>

