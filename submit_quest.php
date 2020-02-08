<?php
require "dbcon.php";
session_start();
var_dump($_POST);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$target_dir = "uploads/";
$target_file = $target_dir . generateRandomString(5) . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$sql = "select reward, is_main from quest where id = ". $_POST['id'];
$result = $conn->query($sql);
$reward = 0;
$is_main = 2;
while($row = $result->fetch_assoc()) {
	$reward = $row['reward'];
	$is_main = $row['is_main'];
}

$point = 0;
$sql = "select credit, main_completed, side_completed from user where id = ". $_SESSION['id'];
echo $sql;
$result = $conn->query($sql);
$main = 0;
$side = 0;
while($row = $result->fetch_assoc()) {
	$point = $row['credit'];
	$main = $row['main_completed'];
	$side = $row['side_completed'];
}

if ($is_main == 0){
	$side +=1;
}
else if($is_main ==1){
	$main +=1;
}

$point = $point+$reward;

$sql = "update user set credit = ".$point." where id = ". $_SESSION['id'];
$result = $conn->query($sql);

$sql = "update user set main_completed = ".$main." where id = ". $_SESSION['id'];
$result = $conn->query($sql);

$sql = "update user set side_completed = ".$side." where id = ". $_SESSION['id'];
$result = $conn->query($sql);



$sql = "insert into submit_quest (id_user, id_quest, file) values('".$_SESSION['id']."','". $_POST['id'] . "','". $target_file ."')";

$result = $conn->query($sql);
// echo "$sql";
header("Location: completed_quest.php");
die();

?>