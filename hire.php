<?php

require ("dbcon.php");


$sql = "insert into user(name, username, password, email, status, class) values('".$_POST['name']."', '".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', 2, '".$_POST['class']."')";
$result = $conn->query($sql);

$sql = "insert into buddy_newbie(id_newbie, id_buddy) values('".mysqli_insert_id($conn)."', '".$_POST['buddy']."')";
$result = $conn->query($sql);

header("Location: adventurer_list.php");
die();
?>