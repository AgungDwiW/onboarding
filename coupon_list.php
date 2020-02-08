<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
?>

<div class="card table-responsive" style="border-radius: 0px !important;">
    <!-- /.card-header -->
    <div class="card-header">                              
        Shady coupon man
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

		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Coupon for cereals - 100 credit</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">Oatmeal x5; chocho crunchx10</h6>
		    <p class="card-text">A cereal that perfect to start your day! grab now, only 100 credit</p>	
		    <a href="#" class="card-link">Buy</a>
		  </div>
		</div>

		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Coupon for hug (once) - 10 credit</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">a hug full of love from our mascot</h6>
		    <p class="card-text">You know him? of course you know! he is our maskot didnt you want to hug him? that round shape, that fluffy body!</p>	
		    <a href="#" class="card-link">Buy</a>
		  </div>
		</div>

		<div class="card border-primary mb-12"  style="margin-bottom: 1rem">
		  <div class="card-body text-primary">
		  	<h5 class="card-title">Girlfriend / Boyfriend - 999999999 credit</h5>
		  	<h6 class="card-subtitle mb-2 text-muted">No comment</h6>
		    <p class="card-text">uh, yes that..</p>	
		    <a href="#" class="card-link">Buy</a>
		  </div>
		</div>

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

