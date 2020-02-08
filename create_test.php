<?php
include ("sidebar_top.html");
?>
<?php
if ($_SESSION['type']!= 0 and $_SESSION['type']!=1){
	header("Location: index.php");
	die();
}
?>
<?php
include ("sidebar_top2.html");
?>

<div id="buildyourform">
			
			
		
			<div class="form-group row text-left"><!-- UID -->
				  <label class="control-label col-sm-3" for="UID">UID Utama:</label>
					  
					  <div class="col-sm-<?php echo $flag_sign?6:4;?>">
						<input type="text" class="form-control inputsm" name="UID" id="UID" placeholder="UID" value =  "<?php echo $uid;?>" readonly > 
					  </div>
					  <div class="col-sm-<?php echo $flag_sign?3:2;?>">
						<select class="form-control inputsm" name="TID" id="TID" placeholder="Tipe id"    required>
							
							<option value="KTP"<?php 

								if ($tid == "KTP") {
									echo "selected";
								}
							 ?>>KTP</option>
							<option value="Kartu Pegawai"<?php 
								if ($tid == "Kartu Pegawai") {
									echo "selected";
								}
							 ?>
							>Kartu Pegawai</option>
							<option value="SIM" <?php 
								if ($tid == "SIM") {
									echo "selected";
								} 
							 ?>>SIM</option>
							 <option value="Paspor" <?php 
								if ($tid == "Paspor") {
									echo "selected";
								} 
							 ?>>Paspor</option>
							 <option value="Lainnya" <?php 
								if ($tid == "Lainnya") {
									echo "selected";
								} 
							 ?>>Lainnya</option>
						</select>
					  </div>
				   <?php if (!$flag_sign) {?>
				  <div class="col-sm-3">
					<button type="button" value="+" class="col-sm-5 btn btn-primary"  id="add">+</button> 
					<button type="button" value="-" class="col-sm-5 btn btn-danger"  id="removed">-</button>
				 </div> 
				 <?php } ?>
			</div>
</div>


<script>
     $(document).ready(function() {
		var counter = <?php echo $count ?>;
		var tcounter = 1;
	$("#add").click(function() {
		if(counter>3){
			alert("Hanya tiga identitas yang diperbolehkan setiap tamu!.");
			return false;
	} 
		var lastField = $("#buildyourform div:last");
		var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
		 var fieldWrapper = $("<div class=\"form-group row text-left\" id =\"UID" + counter +"\"/>");
		var fName = $("<div class=\"col-sm-6\">  <input type=\"text\" class=\"form-control inputsm\" placeholder=\"UID"+counter+"\" id = uid"+counter+" name = uid"+counter+"> </div>");
		var fType = $("<div class=\"col-sm-3\"><select class=\"form-control inputsm\"  placeholder=\"Tipe id\"required id = tid"+counter+" name = tid"+counter+"><option value=\"KTP\"" + ">KTP</option><option value=\"Kartu Pegawai\"" + ">Kartu Pegawai</option><option value=\"SIM\"" +">SIM</option></select></div>"); 
		var removeButton = $("<label class=\"control-label col-sm-3\" for=\"UID\">UID Tambahan:</label>);")
		removeButton.click(function() {
			$(this).parent().remove();
		});
		fieldWrapper.append(removeButton);
		fieldWrapper.append(fName);
		fieldWrapper.append(fType);
		counter++;
		$("#buildyourform").append(fieldWrapper);
	});
	
	// ==========================================================================================
	// Remove multiple UID
	// ==========================================================================================
   $("#removed").click(function () {
	if(counter==1){
		  alert("satu identitas minimal untuk setiap tamu");
		  return false;
	   }   

	counter--;

		$("#UID" + counter).remove();

	 });
</script>

<?php
include ("sidebar_botom.html");
?>