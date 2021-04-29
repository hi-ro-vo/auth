<?php
$db = mysqli_connect("localhost", "root", "root", "lab1");

$res = mysqli_query($db, "Select name,surname From users ");

$arr = [];
while ($user= mysqli_fetch_array($res)){
    array_push($arr, array("name" => $user["name"], "surname" => $user["surname"]));
}

$res = mysqli_query($db, "Select count(*) as c From users ");

$c = mysqli_fetch_array($res)["c"];
echo json_encode(array("names" => $arr, "count" => $c));
?>
