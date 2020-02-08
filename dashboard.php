<?php
include ("sidebar_top.html");
?>

     <link rel="stylesheet" type="text/css" href="Style/dashboard.css">
    <style>
        .cd-foot{
            position: absolute;
            bottom: 0px;
            width: 100%;
        }
        .green{
            background-color: #e4f5eb !important;
            color: black;
        }
        .yellow{
            background-color: #fcf9e6;
            color: black;
        }
</style>
 
<?php
include ("sidebar_top2.html");
?>

  <!-- Navigation -->
  <!-- Page Content -->
  <div class="container" >

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 >Welcome back <?php 
      if ($_SESSION['type']==0) echo "HR ";
      if ($_SESSION['type']==1) echo "Buddy ";
      if ($_SESSION['type']==2) echo "Adventurer ";
      echo $_SESSION['name']; ?>! <br> </h1>
      <h3>There's a lot thing to do today, keep the spirit! </h3>
      
    </header>
      <br>

    <!-- Page Features -->
    <div class="row text-center">
    <?php 
    	// ===============================admin card==============================================
    	// ===============================admin card==============================================
    	// ===============================admin card==============================================
    	if ($_SESSION['type'] == 0){
    ?>
        <div class="col-lg-3 col-md-6 mb-4"> 
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/quest.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Give Quest</h4>
            <p class="card-text">Give quest to the adventurer!</p>
          </div>
          <div class="card-footer">
            <a href="main_quest.php" class="btn btn-primary">Quest</a>
          </div>
        </div>
      </div>

       <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/private.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Recruit new adventurer</h4>
            <p class="card-text">Call new adventurer to the village</p>
          </div>
          <div class="card-footer">
            <a href="hire_adventurer.php" class="btn btn-primary">Recruit</a>
          </div>
        </div>
      </div>
 
       <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/report.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Recruit new budy</h4>
            <p class="card-text">Ask a vilager to company the new adventurer</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary" >Recruit</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
       <div class="card h-100">
          <!-- <img class="card-img-top" src="vendor/Images/tree.jpg" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Stage Building</h4>
            <p class="card-text">Design the stage for your adventurer</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary" >Stage</a>
          </div> -->
        </div>
      </div>
 
      
    </div> 
    <!-- /.row -->
     <?php 
     	}
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	else if ($_SESSION['type'] == 2){
    ?>
      
      <?php
        require('dbcon.php');
        $sql = "SELECT * FROM quest where (is_main = 1 and stage = ".$_SESSION['stage'].") or issued_to =  '" . $_SESSION['id'] . "'";
        
        $result = $conn->query($sql);
        $tot = $result->num_rows;
        if ($result->num_rows>0) {
          //login success
          $count = 0;
          while($row = $result->fetch_assoc() and $count<4) {
            $sql = "SELECT * FROM submit_quest where id_user = ".$_SESSION['id']." and id_quest =  '" . $row['id'] . "'";
            $result2 = $conn->query($sql);
            if ($result2->num_rows>0){
              $tot-=1;
              continue;
            }
            $count+=1;
            $subtitle = substr($row['subtitle'],0,80) ;
            $subtitle = "".$subtitle . "..."; 
            $deadline = $row['deadline']==''?"-":$row['deadline'];

            $quest_stat = $row['is_main']==1?"Main Quest":"Sub Quest";
            echo '<div class="col-lg-3 col-md-6 mb-4" style="text-align: left">';  
            echo "<a href='quest_show.php?id=". $row['id']."'>";
            echo '<div class="card h-100 ">';
            echo '<div class="card-body" style="height:420px;">';
            echo '<h4 class="card-title">'.$row['title'].'</h4>';
            echo "<hr>";
              if ($row['is_main']==0){
                  echo '<h5 class="card-subtitle mb-2 text-muted green">'.$quest_stat.'</h5>';
              }
              else{
                  
            echo '<h5 class="card-subtitle mb-2 text-muted yellow">'.$quest_stat.'</h5>';
              }
            echo '<p class="card-text">'.$subtitle.'</p></div>';
              echo '<div class="card-footer text-muted cd-foot">'; 
                     
            echo "Reward : ".$row['reward'];
            echo "<br>Deadline : ".$deadline. "</p>";
            echo "</a>";
            echo "</div></div></div>";
            
          }
        }
        for ($x = $tot; $x<4; $x++){
          echo '<div class="col-lg-3 col-md-6 mb-4" style="text-align: left">';  
            echo '<div class="card h-100">';
            echo "</div></div>";
        }
      ?>
<!--
    <div class="col-lg-3 col-md-6 mb-4" style="text-align: left">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title">Test for new adventurer</h4>
            <h5 class="card-subtitle mb-2 text-muted">Main Quest - Test Quest</h5>
            <p class="card-text">This vilage is already well fed and comfortable to live in but best thing won't last forever, 
        we need champion to protect our vilage from future threat</p>
          </div>
        </div>
      </div>
 
      <div class="col-lg-3 col-md-6 mb-4" style="text-align: left">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title">Pick some grass</h4>
            <h5 class="card-subtitle mb-2 text-muted">Main Quest - Submit Quest</h5>
            <p class="card-text">For starter please pick some grass that overgrow in the vilage. Take this chance to know the vilagers and submit the photo of your work</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" style="text-align: left">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title">Let's talk</h4>
            <h5 class="card-subtitle mb-2 text-muted">Main Quest - Quisionary Quest</h5>
            <p class="card-text">How was your first week? is it full of grass? Hahaha... calm down. Tell me what happen this past week.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4" style="text-align: left">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title">Hey its your neighbour</h4>
            <h5 class="card-subtitle mb-2 text-muted">Sub Quest - Submit Quest</h5>
            <p class="card-text">Hello there its me, jack can you take a photo of my house from top of that hill?</p>
          </div>
        </div>
      </div>
 -->
    </div>
    <!-- /.row -->
    <?php 
     	}
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	else if ($_SESSION['type'] == 2){}
    ?>
  </div>
  <!-- /.container -->

  <!-- Footer -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
include ("sidebar_botom.html");
?>
</html>