<?php
include ("sidebar_top.html");
?>
<?php
include ("sidebar_top2.html");
?>
<div class="card-columns">

     <?php
        require('dbcon.php');
        $sql = "SELECT * FROM quest where (is_main = 1 and stage = ".$_SESSION['stage']." ) or issued_to =  '" . $_SESSION['id'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows>0) {
          //login success
          $count = 0;
          while($row = $result->fetch_assoc()) {
            $sql = "SELECT * FROM submit_quest where id_user = ".$_SESSION['id']." and id_quest =  '" . $row['id'] . "'";
            $result2 = $conn->query($sql);
            if ($result2->num_rows>0){
              continue;
            }
            $count+=1;
            
            $deadline = $row['deadline']==''?"-":$row['deadline'];
            

            $quest_stat = $row['is_main']==1?"Main Quest":"Sub Quest";
            echo "<a href='quest_show.php?id=". $row['id']."'>";
            echo '<div class="card">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title">'.$row['title'].'</h4>';
            echo "<hr>";
            echo '<h5 class="card-subtitle mb-2 text-muted">'.$quest_stat.'</h5>';
            echo '<p class="card-text">'.$row['subtitle'].'</p></div>';
            echo '<div class="card-footer text-muted">';            
            echo "Reward : ".$row['reward'];
            echo "<br>Deadline : ".$deadline. "</p>";
            echo "</a>";
            echo "</div></div>";
            
          }
        }
      ?>
</a>
  </div>

<?php
include ("sidebar_botom.html");
?>