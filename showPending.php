<?php
include "dbConnect.php";
   
     if(isset($_POST['newtask'])){
      $task = $_POST['newtask'];
      unset($_POST['newtask']); 
      mysqli_query($connect,"INSERT INTO todos VALUES ('','$task','')");
        
}
        if(isset($_POST['delid'])){
            $delid = $_POST['delid'];
            unset($_POST['delid']); 
            mysqli_query($connect,"DELETE FROM todos WHERE id = '$delid'");
        }
        if(isset($_POST['comid'])){
            $comid = $_POST['comid'];
            unset($_POST['comid']);
            mysqli_query($connect,"UPDATE todos SET completed = 1 WHERE id = '$comid'");
        }
        
        
        ?>
        
        
        <div class="todo">
        <?php
        $res = mysqli_query($connect, 'SELECT *FROM todos WHERE completed = "0"');
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) { ?>
            <div class="taskabtn">
            <div class="task"><?php
            echo '<p>';
            echo $row['task'], '<br>';
            echo '</p>';
            
            ?>
             </div>    
         <div class="taskbtns">
         <button onClick ="comTask(<?php echo $row['id'] ?>)"><img src="./outline_done_black_24dp.png" alt="" title="Mark"></button>
       <button onClick ="delTask(<?php echo $row['id'] ?>)"><img src="./outline_clear_black_24dp.png" alt="" title = "Delete from list"></button>
        </div></div>
           
    <?php }
        } else {
           echo "No pending task";
        }
        ?>


<script>
   
	


    function showPending(){
        $(document).ready(function(){
        $(".todos").load("showPending.php",{});
          
        }) 
    }
    function showCompleted(){
        $(document).ready(function(){
        $(".todos").load("showCompleted.php",{});
          
        }) 
    }
    function delTask(id){
       $(document).ready(function(){
        $(".todos").load("showPending.php",{
          delid:id
          });
          
        })
        
    
    }
    function comTask(id){
        $(document).ready(function(){
        $(".todos").load("showPending.php",{
          comid:id
          });
          
        })
    }
  </script>

