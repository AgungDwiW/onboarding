<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        Adventurer rooster
    </div>
    <div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<a href="hire_adventurer.php"><button type="button" class="btn btn-primary btn-block">Hire Adventurer</button></a>
			</div>
			<div class="col-sm-5">
				
			</div>
			<div class="col-sm-3">
				<input class="form-control" type="text" placeholder="Search" aria-label="Search" style="margin-bottom: 1rem">		
			</div>
		</div>
		<?php
			require('dbcon.php');
	        $sql = "SELECT * FROM user where status = 2";
	        $result = $conn->query($sql);
	        if ($result->num_rows>0) {
	          //login success
	          while($row = $result->fetch_assoc()) {
	            echo '<div class="card border-primary mb-12"  style="margin-bottom: 1rem">';
	            echo '<div class="card-body text-primary">';
	            echo '<h5 class="card-title">'.$row['name'].'</h5>';
	            echo '<h6 class="card-subtitle mb-2 text-muted"> Divisi :'.$row['class'].'</h6>';
	            echo '<h6 class="card-subtitle mb-2 text-muted"> Current Stage : '.$row['current_stage'].'</h6>';
	            echo '<a href="#" class="card-link">Detail</a>';
	            echo "</div></div>";
	            
	          }
	        }
		?>
<!-- 
		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Test for new adventurer</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">Stage 1 - Test Quest</h6>
		    <p class="card-text">This vilage is already well fed and comfortable to live in but best thing won't last forever, 
		    we need champion to protect our vilage from future threat</p>	
		    <a href="#" class="card-link">Detail</a>
			<a href="#" class="card-link">Edit</a>
		  </div>
		</div>


		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Pick some grass</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">Stage 1 - Submit Quest</h6>
		    <p class="card-text">For starter please pick some grass that overgrow in the vilage. Take this chance to know the vilagers and submit the photo of your work</p>	
		    <a href="#" class="card-link">Detail</a>
			<a href="#" class="card-link">Edit</a>
		  </div>
		</div>


		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Let's talk</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">Stage 1 - Quisionary Quest</h6>
		    <p class="card-text">How was your first week? is it full of grass? Hahaha... calm down. Tell me what happen this past week.</p>	
		    <a href="#" class="card-link">Detail</a>
			<a href="#" class="card-link">Edit</a>
		  </div>
		</div> -->
	</div>
</div>

<?php
include ("sidebar_botom.html");
?>