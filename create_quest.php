<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        Post a quest
    </div>
    <div class="card-body">
    	<form method="POST" action="create_test.php" id = "form">
    	<div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" placeholder="Quest Title" id="title" name="title">
		</div>
    
    
    	<div class="form-group">
		    <label for="title">Subtitle:</label>
		    <input type="text" class="form-control" placeholder="Quest Subtitle" id="subtitle" name="subtitle">
		</div>
		<div class="form-group">
		    <label for="title">Quest Type:</label>
		    <div class="row">
			    <div class="col-sm-4">
			     	<select class="form-control" name="main" id="main">
			     		<option>Main quest</option>
			     		<option>Sub quest</option>
			     	</select>
			    </div>
			    <div class="col-sm-4">
			      <select class="form-control" name="stage" id="stage">
			     		<option>Stage 1</option>
			     		<option>Stage 2</option>
			     		<option>Stage 3</option>
			     	</select>
			    </div>
			    <div class="col-sm-4">
			      <select class="form-control" name="type" id="type" onchange="changeAct()">
			     		<option value="test">Test Type</option>
			     		<option value="submit">Submit Type</option>
			     		<option value="questionaire">Questionaire Type</option>
			     	</select>
			    </div>
			  </div>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-block" value="POST">
		</div>
		</form>
    </div>
</div>
<script type="text/javascript">
	function changeAct() {
		var e = document.getElementById("type");
		var form = document.getElementById("form");
		var val = e.options[e.selectedIndex].value;
		if (val == "test"){
			form.action = "create_test.php";
		}
		else if (val=="submit"){
			form.action = "create_submit.php";
		}
		else {
			form.action = "create_questionaire.php";
		}
	}
</script>
<?php
include ("sidebar_botom.html");
?>