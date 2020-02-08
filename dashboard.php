<?php
include ("sidebar_top.html");
?>

     <link rel="stylesheet" type="text/css" href="Style/dashboard.css">
<?php
include ("sidebar_top2.html");
?>

  <!-- Navigation -->
  <!-- Page Content -->
  <div class="container"  >

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <h1 >Welcome <?php echo $_SESSION['name']; ?>!</h1>
     
    </header>

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
          <img class="card-img-top " src="vendor/Images/private.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Recruit new adventurer</h4>
            <p class="card-text">Call new adventurer to the village</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Recruit</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/report.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Adventurer Report</h4>
            <p class="card-text">Look at the overal report of adventurers</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Report</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/tree.jpg" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Stage Building</h4>
            <p class="card-text">Design the stage for your adventurer</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Stage</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="vendor/Images/quest.png" alt="" style="height :150px">
          <div class="card-body">
            <h4 class="card-title">Give Quest</h4>
            <p class="card-text">Give quest to the adventurer!</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Quest</a>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->
     <?php 
     	}
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	// ===============================admin card end==============================================
    	else if ($_SESSION['type'] == 1){
    ?>
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/500x325" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

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