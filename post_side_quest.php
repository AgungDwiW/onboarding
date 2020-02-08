<?php
require "dbcon.php";
session_start();
$sql = "insert into quest(title, subtitle, is_main, type,  issued_by, reward, deadline, issued_to) values('".$_POST['title']."','". $_POST['subtitle'] . "',0,'submit',' ". $_SESSION['id'] . "', '".$_POST['credit']."', '".$_POST['deadline']."', '".$_POST['issued_to']."')";
echo "$sql";
$result = $conn->query($sql);
$_SESSION['credit'] -= (int)$_POST['credit'];
$sql = "update user set credit = " . (int)$_SESSION['credit'] . " where id = ".$_SESSION['id'];
$result = $conn->query($sql);


// echo "$sql";
header("Location: main_quest.php");
die();

?>