<?php
require "dbcon.php";
session_start();
$sql = "insert into submit_quest (id_user, id_quest, file) values('".$_POST['title']."','". $_POST['subtitle'] . "',1,'submit','". $_POST['stage'] ."',' ". $_SESSION['id'] . "', 10)";
$result = $conn->query($sql);
// echo "$sql";
header("Location: main_quest.php");
die();

?>