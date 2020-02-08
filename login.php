<?php

session_start();

require ("dbcon.php");

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$sql = "SELECT * FROM user where username = '" . $username . "' and password = '" . $password . "' ";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	//login success
	while($row = $result->fetch_assoc()) {
		$_SESSION['main'] = $row['main_completed'];
		$_SESSION['side'] = $row['side_completed'];
		$_SESSION['stage'] = $row['current_stage'];
		$_SESSION ['type'] = $row['status'];
		$_SESSION ['id'] = $row['id'];
		$_SESSION ['name'] = $row['name'];
		$_SESSION ['email'] = $row ['email'];
		$_SESSION ['profpic'] = $row['image_profile'];
		$_SESSION ['class'] = $row['class'];
		$_SESSION ['credit'] = $row['credit'];
    }
	header("Location: dashboard.php");
	die();
}
else{
	header("Location: index.php");
	die();
}

?>

