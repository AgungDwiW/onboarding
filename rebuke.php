<?php


session_start();

require ("dbcon.php");

$sql = "SELECT * FROM quest where id = " . $_GET['id'];

$result = $conn->query($sql);
$questid = '';
if ($result->num_rows == 1) {
	//login success
	while($row = $result->fetch_assoc()) {
		$quest = $row;
    }
}


$point = 0;
$sql = "select credit, main_completed, side_completed from user where id = ". $_SESSION['id'];

$result = $conn->query($sql);
$main = 0;
$side = 0;
while($row = $result->fetch_assoc()) {
	$point = $row['credit'];
	$main = $row['main_completed'];
	$side = $row['side_completed'];
}

$point -= $quest['reward'];
$side -=1;

$sql = "update user set credit = ".$point." where id = ". $_SESSION['id'];
$result = $conn->query($sql);

$sql = "update user set side_completed = ".$side." where id = ". $_SESSION['id'];
$result = $conn->query($sql);

$sql = "update quest set completed = 0  where id = ". $_GET['id'];
$result = $conn->query($sql);

$sql = "DELETE from submit_quest where id_quest = ". $_GET['id'];
$result = $conn->query($sql);
header("Location: main_quest.php");
die();

?>