<?php

require ("dbcon.php");


$sql = "insert into user(name, username, password, email, status, class, credit) values('".$_POST['name']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', 1, '".$_POST['class']."', 100)";
$result = $conn->query($sql);

header("Location: adventurer_list.php");
die();
?>