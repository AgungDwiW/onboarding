<?php
include ("sidebar_top.html");?>

<?php
if ($_SESSION['type']!= 0 and $_SESSION['type']!=1){
	header("Location: index.php");
	die();
}
?>

<link rel="stylesheet" type="text/css" href="Style/quest.css">

<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive quest-card" >
    <!-- /.card-header -->
    <div class="card-header text-center quest-head">                              
        Hire a buddy!
    </div>
    <div class="card-body">
    	<form method="POST" action="hire_b.php" id = "form" id = "form">
    	<div class="form-group">
		    <label for="title">Buddy Name:</label>
		    <input type="text" class="form-control" placeholder="Name" id="title" name="name">
		</div>

		<div class="form-group">
		    <label for="title">Buddy Email:</label>
		    <input type="text" class="form-control" placeholder="Email" id="email" name="email">
		</div>

		<div class="form-group">
		    <label for="title">Divisi:</label>
		    <input type="text" class="form-control" placeholder="Email" id="email" name="class">
		</div>

    	<div class="form-group">
		    <label for="title">Username:</label>
		    <input type="text" class="form-control" placeholder="username" id="username" name="username">
		</div>

		<div class="form-group">
		    <label for="title">Password:</label>
		    <input type="text" class="form-control" placeholder="password" id="password" name="password">
		</div>
		
		<div id = "before" class="form-group"></div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-block btn-quest" value="POST">
		</div>
		</form>
    </div>
</div>


<?php
include ("sidebar_botom.html");
?>
    