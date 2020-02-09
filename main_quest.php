<?php
include ("sidebar_top.html");
?>
<style>
    .card-main{
        border-color: #23b5b5 !important;
        color: #23b5b5 !important;
        border-radius: 20px 20px 0px 0px;
    }
</style>
<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        Main Quest List
    </div>
    <div class="card-body">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-3">
				<input class="form-control" type="text" placeholder="Search" aria-label="Search" style="margin-bottom: 1rem">		
			</div>
            
            <div class="col-sm-1">
				<a href="create_quest.php"><button type="button" class="btn btn-primary btn-block">Post Quest</button></a>
			</div>
			<div class="col-sm-8">
				
			</div>
			
		</div>
        

		<?php
			require('dbcon.php');
	        $sql = "SELECT * FROM quest where issued_by = ". $_SESSION['id'];
	        $result = $conn->query($sql);
	        if ($result->num_rows>0) {
	          //login success
	          while($row = $result->fetch_assoc()) {
	            echo '<div class="card border-primary mb-12 card-main"  style="margin-bottom: 1rem">';
	            echo '<div class="card-body text-primary card-main">';
	            $completed = '';
	            $file = '';
	            if ($row['is_main']==0 and $row['completed'] ==1){
		            $completed = "<i>(COMPLETED)</i>";
		            $sql = "SELECT * FROM submit_quest where id_quest = ". $row['id'];
			        $result = $conn->query($sql);

			        if ($result->num_rows>0) {
			        	while($rows = $result->fetch_assoc()) {
			        		$file =   $rows['file'];
			        		$submitted = $rows['submitted'];
			        	}
			        }

	            }
	            echo '<h5 class="card-title">'.$row['title']." ".$completed.'</h5>';
	            if($row['is_main']==1) echo '<h6 class="card-subtitle mb-2 text-muted">Stage '.$row['stage'].'</h6>';
	            echo '<p class="card-text">'.$row['subtitle'].'</p>	';
	            if (($row['is_main']==0 and $row['completed']==1))echo '<p class="card-text">Completed at : '.$submitted.'</p>' ;

	            if (!($row['is_main']==0 and $row['completed']==1))echo '<a href="edit_quest.php?id='.$row['id'].'" class="card-link">Edit</a>';
	            if (($row['is_main']==0 and $row['completed']==1))echo '<a download="submission.jpg" href="'.$file.'" 
	            class="card-link">View Submision</a>';
	            if (($row['is_main']==0 and $row['completed']==1))echo '<a href="#" class="card-link" style="color:red" data-toggle="modal" data-target="#rebukeWarning" id = '.$row['id'].'  onClick="reply_click(this.id)" >Rebuke</a>';
	            echo "</div></div>";
	            
	          }
	        }
		?><!-- 
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
		<!-- Modal -->
<div class="modal fade" id="rebukeWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rebuke!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you really want to rebuke this submission? doing so will forfeit the completion reward from this quest and mark it as uncompleted quest (adventurer may resubmit his submission).
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id = "rebuke_id"><button type="button" class="btn btn-primary">Yes</button></a>
      </div>
    </div>
  </div>
</div>
	</div>
</div>
<script type="text/javascript">
 function reply_click(clicked_id)
  {
      a = document.getElementById('rebuke_id');
      a.setAttribute('href', 'rebuke.php?id='+clicked_id);
  }
</script>
<?php
include ("sidebar_botom.html");
?>

