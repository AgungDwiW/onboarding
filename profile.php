<?php
include ("sidebar_top.html");
?>

<link href="Style/profile.css" rel="stylesheet" id="bootstrap-css">
<!------ Include the above in your HEAD tag ---------->


<?php
include ("sidebar_top2.html");
?>
<div class="container profile ">
	<div class="row">
        <div class="row">
            
            <div class="col-sm-4 text-center">
                <figure>
                    <img src="<?php echo $_SESSION['profpic'] ?>" alt="" class="img-circle img-fluid">
                </figure>
            </div>
            <div class="col-sm-8">
                <h2><?php echo $_SESSION['name'] ?></h2>
                <p><strong>Class : </strong><?php echo $_SESSION['class'] ?></p>
                <p><strong>Email : </strong> <?php echo $_SESSION['email'] ?> </p>
            </div>             
        </div>          
        <?php 
        if ($_SESSION['type']==2){
        ?>
        <div class="row col-sm-12 text-center divider">
            <div class=" col-sm-4 emphasis">
                <h2><strong> 1 </strong></h2>                    
                <p><small>Main Quest Done</small></p>
                <!-- <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button> -->
            </div>
            <div class=" col-sm-4 emphasis">
                <h2><strong>0</strong></h2>                    
                <p><small>Sub Quest Done</small></p>
                <!-- <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button> -->
            </div>
            <div class=" col-sm-4 emphasis">
                <h2><strong>1</strong></h2>                    
                <p><small>Stage</small></p>
            </div>
        </div>
	   <?php
        }
       ?>
	</div>
</div>

<?php
include ("sidebar_botom.html");
?>