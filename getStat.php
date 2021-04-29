<?php
$db = mysqli_connect("localhost", "root", "root", "lab1");

$res = mysqli_query($db, "Select name,surname From users ");

$arr = [];
while ($user= mysqli_fetch_array($res)){
    array_push($arr, array("name" => $user["name"], "surname" => $user["surname"]));
}

$res = mysqli_query($db, "Select count(*) as c From users ");

$c = mysqli_fetch_array($res)["c"];


$date_array = getdate();
$begin_date = date ("Y-m-d", mktime(0,0,0, ($date_array['mon'] + 11) % 12 ,1, $date_array['year']));

$res = mysqli_query($db, "Select count(*) as c From users WHERE date >= $begin_date");
$b = mysqli_fetch_array($res)['c'];

$res = mysqli_query($db, "Select name,surname From users order by date desc limit 0,1");
$last = mysqli_fetch_array($res);
echo json_encode(array("names" => $arr, "count" => $c, "last_month" => $b, "last_user" => $last));
?>
