<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        Your hall of fame
    </div>
    <div class="card-body">
		<div class="row">
			<div class="col-sm-1">
			</div>
			<div class="col-sm-8">
				
			</div>
			<div class="col-sm-3">
				<input class="form-control" type="text" placeholder="Search" aria-label="Search" style="margin-bottom: 1rem">		
			</div>
		</div>

		 <?php
        require('dbcon.php');
        $sql = "SELECT quest.* FROM submit_quest INNER JOIN quest ON submit_quest.id_quest=quest.id where id_user =  '" . $_SESSION['id'] . "'";

        $result = $conn->query($sql);
        if ($result->num_rows>0) {
          //login success
          while($row = $result->fetch_assoc()) {
            $deadline = $row['deadline']==''?"-":$row['deadline'];

            $quest_stat = $row['is_main']==1?"Main Quest":"Sub Quest";
            echo '<div class="card border-primary mb-12"  style="margin-bottom: 1rem">';
            echo '<div class="card-body text-primary">';
            echo '<h5 class="card-title">'.$row['title'].'</h5>';
            echo '<p class="card-text">'.$row['subtitle'].'</p>	';
            echo '<a href="#" class="card-link">Detail</a>';
            echo "</div></div>";
            
          }
        }
      ?>
	</div>
</div>

<?php
include ("sidebar_botom.html");
?>