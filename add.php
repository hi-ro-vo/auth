<?php

$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
$recaptcha_secret = '6Lem-74aAAAAABfYj8GMtnlIBh0nWq7oNIVWlny1'; // Insert your secret key here
$recaptcha_response = $_POST['recaptcha_response'];

// Выполняем POST-запрос
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

$recaptcha = json_decode($recaptcha);
// Принимаем действие на основе возвращаемой оценки
if ($recaptcha->success == true && $recaptcha->score >= 0.5 && $recaptcha->action == 'contact') {
    // Это человек. Вставляем сообщение в базу данных или отправляем на электронную почту
    if (isset($_POST['name'])) {
        $name = trim($_POST['name']);
    }
    if (isset($_POST['surname'])) {
        $surname = trim($_POST['surname']);
    }
    if (isset($_POST['email'])) {
        $email = trim($_POST['email']);
    }
    if (isset($_POST['login'])) {
        $login = trim($_POST['login']);
    }
    if (isset($_POST['password'])) {
        $password = trim($_POST['password']);
    }
    if (isset($_POST['pass2'])) {
        $pass2 = trim($_POST['pass2']);
    }

    if ($password != $pass2){
        echo json_encode(array('message' => "Пароли не совпадают", 'anserType' => 3));
        exit();
    }

    $password = md5($password);


    if (isset($_POST['age'])) {
        $age = trim($_POST['age']);
    }
    if (isset($_POST['sex'])) {
        $sex = trim($_POST['sex']);
    }

    $db = mysqli_connect("localhost", "root", "root", "lab1");

    $res = mysqli_query($db, "Select id From users where login like '$login'");

    $arr = mysqli_fetch_array($res);



    if (!empty($arr["id"])){
        echo json_encode(array('message' => 'Пользователь уже есть', 'anserType' => 2));
        exit();
    }



    $res = mysqli_query($db, "insert into `users` (`name`, `surname`, `email`, `login`, `password`, `age`, `sex`) 
                    VALUES ('$name', '$surname', '$email', '$login', '$password', '$age', '$sex')");
#echo("<script>console.log('$res');</script>");

    echo json_encode(array('message' => 'Пользователь успешно добавлен', 'anserType' => 1));
    exit("Your message sent successfully");

} else {
    // Оценка меньше 0.5 означает подозрительную активность. Возвращаем ошибку
    echo json_encode(array('message' => 'Капча не пройдена', 'anserType' => 1));
    exit();
}

?>