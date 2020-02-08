<?php
require "dbcon.php";
session_start();
$sql = "insert into quest(title, subtitle, is_main, type, stage, issued_by, reward) values('".$_POST['title']."','". $_POST['subtitle'] . "',1,'submit','". $_POST['stage'] ."',' ". $_SESSION['id'] . "', 10)";
$result = $conn->query($sql);
// echo "$sql";
header("Location: main_quest.php");
die();

?>