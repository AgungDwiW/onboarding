<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
$id = $_GET['id'];

require('dbcon.php');
$sql = "SELECT * FROM quest where id = '" . $id . "' ";
$result = $conn->query($sql);


if ($result->num_rows == 1) {
	//login success
	while($row = $result->fetch_assoc()) {
		$quest = $row;
    }
}
?>


<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        <?php
        echo $quest['title'];
        ?>
    </div>
    <div class="card-body">
    	 <p class="card-text"><?php echo $quest['subtitle']; ?></p>

    	 <form  method="post" action="submit_quest.php" enctype="multipart/form-data" >
				<input id="input-b1" name="fileToUpload" type="file" class="file" data-browse-on-zone-click="true" required>
				<!-- <input type="file" class="form-control-file border" name = "image"> -->
                <input type="hidden" name="id" value='<?php echo $id;?>'>
				<input type="submit" name="submit">
				
		 </form>
    </div>
</div>

<?php
include ("sidebar_botom.html");
?>