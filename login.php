<?php
if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
}
if (isset($_POST['password'])) {
    $password = md5(trim($_POST['password']));
}

$db = mysqli_connect("localhost", "root", "root", "lab1");

$res = mysqli_query($db, "Select password From users where login like '$login'");

//exit(400);



$user = mysqli_fetch_array($res);

if (empty($user["password"])) {
    echo json_encode(array('message' => 'Пользователь не найден', 'anserType' => 2));
    exit();
}

if ($user["password"] == $password) {
    $res = mysqli_query($db, "Select name From users where login like '$login'");
    $user = mysqli_fetch_array($res);
    echo json_encode(array('message' => $user["name"], 'anserType' => 1));
    exit();
}
echo json_encode(['message' => 'Пароль не верный', 'anserType' => 3]);
exit();
?>