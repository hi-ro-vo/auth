<?php
if (!isset($_POST['request'])) {
    echo json_encode(array("status" => -1, "message" => "Пустой запрос"));
    exit();
}

$request = trim($_POST['request']);
$search = "select name,surname from users ";
$searchWords =explode(' ', $request);
$were = "";
foreach ($searchWords as $word) {
    $were .= "or name Like $word";
}
$search .= " Where 1=1 $were";

$db = mysqli_connect("localhost", "root", "root", "lab1");

$res = mysqli_query($db, $search);

$arr = [];

echo $search;
echo $res;
echo "\n";
while ($user = mysqli_fetch_array($res)){
    array_push($arr, array("name" => $user["name"]));
}


echo json_encode(array("names" => $arr, "status" => 1));
?>
