<?php
include ("sidebar_top.html");?>

<?php
if ($_SESSION['type']!= 0 and $_SESSION['type']!=1){
	header("Location: index.php");
	die();
}

require ("dbcon.php");

$sql = "SELECT * FROM quest where id = " . $_GET['id'];
$result = $conn->query($sql);
$title = '';
$subtitle = '';
$duration = '';
$deadline = '';
$reward = '';
if ($result->num_rows == 1) {
	//login success
	while($row = $result->fetch_assoc()) {
		$quest = $row;
		$title = $row['title'];
		$subtitle = $row['subtitle'];
		$duration = $row['deadline'];
		$reward = $row['reward'];
    }
}
else{
}

?>

<link rel="stylesheet" type="text/css" href="Style/quest.css">

<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive quest-card" >
    <!-- /.card-header -->
    <div class="card-header text-center quest-head">                              
        Post a quest
    </div>
    <div class="card-body">
    	<form method="POST" action="<?php echo($_SESSION['type']==0?"post_main_quest.php":"post_side_quest.php") ?>" id = "form" id = "form">
    	<div class="form-group">
		    <label for="title">Title:</label>
		    <input type="text" class="form-control" placeholder="Quest Title" id="title" name="title" <?php echo 'value = "'.$title.'"'; ?>>
		</div>
    
    
    	<div class="form-group">
		    <label for="title">Subtitle:</label>
		    <input type="text" class="form-control" placeholder="Quest Subtitle" id="subtitle" name="subtitle" <?php echo 'value = "'.$subtitle.'"'; ?>>
		</div>
		<div class="form-group">

			<?php
	     		if ($_SESSION['type']==0) {
	     			?>
	     			<div class="form-group">
	     				<label for="title">Stage:</label>
				      <select class="form-control" name="stage" id="stage">
				     		<option value="1">Stage 1</option>
				     		<option value="2">Stage 2</option>
				     		<option value="3">Stage 3</option>
				     	</select>
				    </div>
	     			<?php
     			//admin
	     		}
			?>
			    <!-- <div class="col-sm-4">
			      <select class="form-control" name="type" id="type" onchange="changeAct()">
			     		<option value="test">Test Type</option>
			     		<option value="submit">Submit Type</option>
=======
		    <label for="title">Quest Type:</label>
		    <div class="row">

			    <div class="col-sm-4">
			     	<select class="form-control slt-quest" name="main" id="main">
			     		<?php
			     		if ($_SESSION['type']==0) {
			     			//admin
			     		?>
			     		<option>Main quest</option>
			     		<?php
			     		}
			     		if ($_SESSION['type'] == 1)
			     		{
			     		?>
			     		<option>Sub quest</option>
			     		<?php
			     		}
			     		?>
			     	</select>
			    </div>
			    <div class="col-sm-4">
			      <select class="form-control slt-quest" name="stage" id="stage">
			     		<option>Stage 1</option>
			     		<option>Stage 2</option>
			     		<option>Stage 3</option>
			     	</select>
			    </div>
			    <div class="col-sm-4">
			      <select class="form-control slt-quest"  name="type" id="type" onchange="changeAct()">
			     	    <option value="submit">Submit Type</option>	
                        <option value="test">Test Type</option>
			     		
                      
>>>>>>> 243a8f8a4f29598e5dc889dd9a292e7931b4772b
			     		<option value="questionaire">Questionaire Type</option>
			     	</select>
			    </div>
			  </div> -->
		</div>
		<?php 
		if ($_SESSION['type'] == 1)
		{
		?>
		<div class="form-group">
			<div class="row">
				<div class="col">
					<label for="title">Duration (in day):</label>
				    <input type="number" class="form-control" placeholder="Quest Deadline" id="title" name="deadline" min="1" <?php echo "value = ".$deadline; ?>>
			    </div>
			    <div class="col">
			    	<label for="title">Reward (Credit left : <?php echo $_SESSION['credit']?>):</label>
				    <input type="number" class="form-control" placeholder="Reward" id="title" name="credit" min = 1 max = <?php echo $_SESSION['credit'] ?> <?php echo "value = ".$reward; ?>>
			    </div>
		    </div>
		</div>
		<div class="form-group">
			<label for="title">To:</label>
		    <select class="form-control" name="issued_to" id="issued_to">

			     	<?php
						require ("dbcon.php");
						$sql = 'SELECT user.name, user.id FROM buddy_newbie INNER JOIN user ON buddy_newbie.id_newbie=user.id';
						$result = $conn->query($sql);
						if ($result->num_rows >= 1) {
							//login success
							while($row = $result->fetch_assoc()) {
								echo "<option value=".$row['id'].">".$row['name']."</option>";			
						    }
						}
			     	?>
			     	
			     		
			</select>
		</div>

		<?php
		}
		?>

		<hr>
		<div id="quest_body">
			
		</div>
		<div id = "before" class="form-group"></div>
		<div class="form-group">
			<input type="submit" name="submit" class="btn btn-block btn-quest" value="POST">
		</div>
		</form>
    </div>
</div>
<script type="text/javascript">
	var before = document.getElementById("before");
	var form = document.getElementById("form");
	var question_num = 0;
	function changeAct() {
		
		var e = document.getElementById("type");
		var val = e.options[e.selectedIndex].value;
		var body = document.getElementById("quest_body");
		

		
		if (val == "test"){
			form.action = "create_test.php";
			// body.parentNode.removeChild(body);
			// var body = document.createElement("div"); 
			// body.setAttribute("id", "quest_body");

			// var question_num = 0;
			// var form_group = document.createElement("div"); 
			// form_group.setAttribute("class", "form-group");
			// body.appendChild(form_group);
			// form.insertBefore(body,before);	
			
			// var input = document.createElement("input"); 
			// input.setAttribute("class", "form-control");
			// input.setAttribute("type", "text");
			// input.setAttribute("placeholder", "question text");

			// input.addEventListener("onactivate", add_question());
			// var label = document.createElement("label");
			// label.innerHTML = "Question Text:"
			// form_group.appendChild(label);
			// form_group.appendChild(input);

			// var form_group2 = document.createElement("div"); 
			// form_group2.setAttribute("class", "row");
			
			

			// var choice1 = document.createElement("input");
			// choice1.setAttribute("class", "form-control");
			// choice1.setAttribute("type", "text");
			// choice1.setAttribute("name", "choice1")
			// choice1.setAttribute("placeholder", "choice1")

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-5");
			// form_group2.appendChild(col);
			// col.appendChild(choice1);

			// var check1 = document.createElement("input");
			// check1.setAttribute("type", "radio");
			// check1.setAttribute("class", "form-check-input col-sm-1");
			// check1.setAttribute("name", "check1");

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-1");
			// form_group2.appendChild(col);
			// col.appendChild(check1);
			
			// var choice2 = document.createElement("input");
			// choice2.setAttribute("class", "form-control");
			// choice2.setAttribute("type", "text");
			// choice2.setAttribute("name", "choice2")
			// choice2.setAttribute("placeholder", "choice2")

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-5");
			// form_group2.appendChild(col);
			// col.appendChild(choice2);

			// var check2 = document.createElement("input");
			// check2.setAttribute("type", "radio");
			// check2.setAttribute("class", "form-check-input col-sm-1");
			// check2.setAttribute("name", "check1");

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-1");
			// form_group2.appendChild(col);
			// col.appendChild(check2);

		
			
		
			// body.appendChild(form_group2);

			// 	var form_group2 = document.createElement("div"); 
			// form_group2.setAttribute("class", "row");

			// var choice1 = document.createElement("input");
			// choice1.setAttribute("class", "form-control");
			// choice1.setAttribute("type", "text");
			// choice1.setAttribute("name", "choice3")
			// choice1.setAttribute("placeholder", "choice3")

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-5");
			// form_group2.appendChild(col);
			// col.appendChild(choice1);

			// var check1 = document.createElement("input");
			// check1.setAttribute("type", "radio");
			// check1.setAttribute("class", "form-check-input col-sm-1");
			// check1.setAttribute("name", "check1");

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-1");
			// form_group2.appendChild(col);
			// col.appendChild(check1);
			
			// var choice2 = document.createElement("input");
			// choice2.setAttribute("class", "form-control");
			// choice2.setAttribute("type", "text");
			// choice2.setAttribute("name", "choice4")
			// choice2.setAttribute("placeholder", "choice4")

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-5");
			// form_group2.appendChild(col);
			// col.appendChild(choice2);

			// var check2 = document.createElement("input");
			// check2.setAttribute("type", "radio");
			// check2.setAttribute("class", "form-check-input col-sm-1");
			// check2.setAttribute("name", "check1");

			// var col = document.createElement("div");
			// col.setAttribute("class", "col-sm-1");
			// form_group2.appendChild(col);
			// col.appendChild(check2);



			// body.appendChild(form_group2);


		}
		else if (val=="submit"){
			form.action = "create_submit.php";
			// body.parentNode.removeChild(body);
			// var body = document.createElement("div"); 
			// body.setAttribute("id", "quest_body");
			// form.insertBefore(body,before);	

		}
		else {
			form.action = "create_quis.php";
			// body.parentNode.removeChild(body);
			// var body = document.createElement("div"); 
			// body.setAttribute("id", "quest_body");
			// form.insertBefore(body,before);	
		}
	}
	function add_question(){
		question_num +=1;

	}
	
</script>

<?php
include ("sidebar_botom.html");
?>
    