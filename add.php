<?php

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
    exit("Пароли не совпадают");
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


?>